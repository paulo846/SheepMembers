<?php

namespace App\Controllers\Super\Api;

use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Participantes extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $mParticipante;
    private $mRelaciona;
    private $mEmpresa;
    private $mConfig;

    public $request;

    public function __construct()
    {
        //
        $this->request = service('request');

        $this->mConfig       = new ConfigModel();
        $this->mEmpresa      = new EmpresaModel();
        $this->mParticipante = new ClientModel();
        $this->mRelaciona    = new EmpresaClienteModel();
    }

    public function index()
    {
    }

    use ResponseTrait;
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        $builder = $this->mParticipante->findAll();

        $data = array();
        $relacionamentos = null;


        foreach($builder as $row){
            $buscaRelacionamento = $this->mRelaciona->where('id_cliente', $row['id'])->findAll();
            if(count($buscaRelacionamento)){
                
                foreach($buscaRelacionamento as $rowRelacionamento){
                    $relacionamentos = $this->mEmpresa->find($rowRelacionamento['id_empresa'])['name'];
                }
            }else{
                $relacionamentos = '';
            }

            $data[] = [
                $row['id'],
                $row['name'],
                $row['email'],
                $row['image'],
                $relacionamentos
            ]; 
        }

        return $this->response->setJSON(['data' => $data]);
        
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        try {
            //recupera dados do formulário
            $input = $this->request->getPost();

            //verifica se email já esta no banco de dados
            if ($row = $this->mParticipante->where('email', $input['email'])->select('id')->findAll()) {
                //dados para atualização
                $id = $row[0]['id'];
                $update = [
                    'id'    => $id,
                    'name'  => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];
                //atualiza
                $this->mParticipante->save($update);
            } else {
                //dados para inserção
                $data = [
                    'name'  => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];
                //cadastra
                $id = $this->mParticipante->insert($data);
            }

            if ($rel = $this->mRelaciona->where(['id_cliente' => $id, 'id_empresa' => $input['empresa']])->findAll()) {
                //dados para relacionamento
                $this->mRelaciona->delete($rel[0]['id']);

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $id,
                    'id_empresa' => $input['empresa'],
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];
                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);
            } else {

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $id,
                    'id_empresa' => $input['empresa'],
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];
                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);
            }


            //busca dados da empresa
            $plataforma = $this->mConfig->where('id_empresa', $input['empresa'])->findAll();

            //html
            $html = "<div style='font-size: 18px;'><h3>Dados para acesso {$plataforma[0]['title_pt']}</h3>";
            $html .= "<p>{$input['name']}, nesse email contém os dados de acesso a plataforma para você assistir ao seu evento!</p>";
            $html .= "Dados de acesso:
            <ul>
                <li><b>Link da plataforma:</b> {$plataforma[0]['slug']}</li>
                <li><b>Seu email:</b> {$input['email']}</li>
                <li><b>Sua senha:</b> mudar123</li>
            </ul></div>";

            //envia email de boas vindas!
            $email = new Ses;

            $email->sendEmail([
                'sender' => 'contato@conect.app',
                'recipient' => $input['email'],
                'subject' => 'Bem vindo!',
                'body'    => $html
            ]);

            return $this->respondCreated(['Ação realizada com sucesso!']);
        } catch (\Exception $e) {

            //resposta 400 - Qualquer erro
            return $this->fail($e->getMessage());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function list()
    {
        $clientsModel = $this->mParticipante;

        if ($this->request->isAJAX() && $this->request->getFile('csvfile')) {

            try {

                $email = new Ses;
                $file = $this->request->getFile('csvfile');

                // Verifica se o arquivo enviado é um arquivo CSV válido
                if ($file->isValid() && $file->getClientMimeType() === 'text/csv') {

                    $csv = new \SplFileObject($file->getTempName());
                    $csv->setFlags(\SplFileObject::READ_CSV);
                    $csv->setCsvControl(',');
                    $data = [];
                    $lineNumber = 1;

                    // Percorre o arquivo CSV linha por linha
                    foreach ($csv as $row) {
                        // Pula a primeira linha (cabeçalho)
                        if ($lineNumber === 1) {
                            $lineNumber++;
                            continue;
                        }

                        // Verifica se a linha contém as 4 colunas esperadas
                        if (count($row) === 3 && $row[0] && $row[1] && $row[2]) {

                            $data[] = [
                                'name' => $row[0],
                                'email' => $row[1],
                                'phone' => $row[2],
                                'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                            ];
                        }

                        $lineNumber++;
                    }

                    if (count($data) > 0) {
                        // Obtém todos os clientes existentes do banco de dados
                        $existingClients = $clientsModel->whereIn('email', array_column($data, 'email'))->findAll();

                        // Separa os novos clientes e os clientes existentes que precisam ser atualizados
                        $newClients = [];
                        $updatedClients = [];

                        foreach ($data as $row) {
                            if ($existingClients) {
                                foreach ($existingClients as $client) {
                                    if ($client['email'] === $row['email']) {
                                        $updatedClients[] = $row;
                                        continue 2;
                                    }
                                }
                            }
                            $newClients[] = $row;
                        }
                    }

                    // Insere os novos clientes no banco de dados
                    if ($newClients) {
                        $clientsModel->insertBatch($newClients);

                        foreach ($newClients as $row) {
                            $this->mRelaciona->relacionaClienteCsv($row, $this->request->getPost('empresa'));
                            $email->acessoInicial($row, $this->request->getPost('empresa'));
                        }
                    }

                    // Atualiza os clientes existentes no banco de dados
                    if ($updatedClients) {
                        $clientsModel->updateBatch($updatedClients, 'email');
                        foreach ($updatedClients as $row) {
                            $this->mRelaciona->relacionaClienteCsv($row, $this->request->getPost('empresa'));
                            $email->acessoInicial($row, $this->request->getPost('empresa'));
                        }
                    }


                }

                return $this->respond(['Cadastrado com sucesso!']);

            } catch (\Exception $e) {

                return $this->fail([$e->getMessage()]);
            
            }
        }
    }


    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
