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
        try {
            $builder = $this->mParticipante->find($id);
            return $this->respond($builder);
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()]);
        }
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
            if ($row = $this->mParticipante->where('email', emailType($input['email']))->select('id')->findAll()) {
                //dados para atualização
                $id = $row[0]['id'];
                $update = [
                    'id'    => $id,
                    'name'  => $input['name'],
                    'email' => emailType($input['email']),
                    'phone' => $input['phone'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];
                //atualiza
                $this->mParticipante->save($update);
            } else {
                //dados para inserção
                $data = [
                    'name'  => $input['name'],
                    'email' => emailType($input['email']),
                    'phone' => $input['phone'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];
                //cadastra
                $id = $this->mParticipante->insert($data);
            }

            //busca relacionamento
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

            //Busca dados empresa
            $empresa = $this->mEmpresa->select('evento')->find($input['empresa']);

            $view = view('usuarios/emails/bem-vindo', [
                'plataforma' => ucfirst($empresa['evento']),
                'logo'       => url_cloud_front() . 'assets/admin/img/logo-1.png',
                'nome'       => $input['name'],
                'link'       => $plataforma[0]['slug'],
                'email'      => emailType($input['email'])
            ]);

            //envia email de boas vindas!
            $email = new Ses;

            $email->sendEmail([
                'sender' => 'contato@sheepmembers.com',
                'sender_name' => ucfirst($empresa['evento']),
                'recipient' => emailType($input['email']),
                'subject' => 'Seu acesso chegou - ' . ucfirst($empresa['evento']),
                'body'    => $view
            ]);

            return $this->respond(['msg' => 'Atualizado com sucesso!']);
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
                                'email' => emailType($row[1]),
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

                return $this->respond(['msg' => 'Cadastrado com sucesso!']);
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
    public function reenviar()
    {

        $input = $this->request->getPost();

        $idEmpresa      = $input['r_evento'];
        $idParticipante = $input['r_id'];


        try {
            $this->mParticipante->save([
                'id' => $idParticipante,
                'name' => $input['r_name'],
                'email' => emailType($input['r_email']),
                'password' => password_hash('mudar123', PASSWORD_BCRYPT)
            ]);

            if ($rel = $this->mRelaciona->where(['id_cliente' => $idParticipante, 'id_empresa' => $idEmpresa])->findAll()) {
                //dados para relacionamento
                $this->mRelaciona->delete($rel[0]['id']);

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $idParticipante,
                    'id_empresa' => $idEmpresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 30,
                ];
                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);
            } else {
                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $idParticipante,
                    'id_empresa' => $idEmpresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 30,
                ];

                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);
            }

            //envia email de boas vindas!
            $email = new Ses;
            $email->acessoInicial(['name' => $input['r_name'], 'email' => $input['r_email']], $idEmpresa);

            return $this->respond(['msg' => 'Atualizado com sucesso!']);
        } catch (\Exception $e) {
            return $this->fail(['error' => $e->getMessage()]);
        }
    }

    public function bloquear(int $id, int $tipo)
    {

        $this->mParticipante->save([
            'id' => $id,
            'bloqueio' => $tipo
        ]);
        return $this->respond(['msg' => 'Bloqueado com sucesso!']);
    }

    public function listaEmpresaCliente($id)
    {
        echo '<style>
        /* Estilos gerais da página */
        
        
        


        table {
            font-size: 12px;
            width: 600px;
            border-collapse: collapse;
        }

        th, td{
            padding: 10px;
        }

        /* Estilos específicos para impressão */
        @media print {
          /* Oculta elementos que não devem ser impressos */
            .no-print {
                display: none;
            }
    
          /* Estilos da tabela */
            table {
                width: 100%;
                border-collapse: collapse;
            }
    
            th, td {
                border: 1px solid #000;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
            }
        </style>';

        $mCliente   = new ClientModel();
        $mEmpresa   = new EmpresaModel();
        $mRelaciona = new EmpresaClienteModel();
        //$mRelaciona->purgeDeleted();

        $empresa = $mEmpresa->find($id);

        $clientes = $mCliente->select('empresa_cliente.name, empresa_cliente.id, empresa_cliente.name empresa_name, empresa_cliente.email, empresa.id id_empresa, relaciona.id relacionamento')
            ->join('empresa_relaciona_cliente relaciona', 'relaciona.id_cliente = empresa_cliente.id')
            ->join('empresa', 'empresa.id = relaciona.id_empresa')
            ->where('empresa.id', $id)
            ->where('relaciona.deleted_at IS NULL')
            ->where('empresa.deleted_at IS NULL')
            ->orderBy('empresa_cliente.id', 'ASC')
            ->findAll();

        $total = count($clientes);
        $valor = (count($clientes) * 18) + 2000;

        echo "<b>Cliente: {$empresa['empresa']}</b><br>";
        echo "<b>Evento: {$empresa['evento']}</b><br>";
        echo '<b>Valor de entrada:</b> R$ 2.000,00 <br>';
        echo '<b>Valor por usuário:</b> R$ 18,00 <br>';
        echo '<b>Total de usuários:</b> ' . $total . ' <br>';
        echo "<b><a href='".site_url('/superadmin/imprimir/csv/'.$id)."'}>Total</a> em reais:</b> " . formatarValor($valor);
        echo '<br><br>';
        echo "<table border='2'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Num</th>";
        echo "<th>Id</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Ação</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($clientes as $key => $cliente) {
            echo "<tr>";
            echo '<td>' . ++$key . '</td>';
            echo '<td>' . $cliente['id'] . '</td>';
            echo '<td>' . $cliente['name'] . '</td>';
            echo '<td>' . $cliente['email'] . '</td>';
            echo '<td> <a href="' . site_url() . '/superadmin/relacionamento/excluir/' . $cliente['relacionamento'] . '">Excluir</a></td>';
            echo '</tr>';
        }
        echo "</tbody>";
        echo "</table>";
    }

    public function downloadListRelatorio($id)
    {
        $mCliente   = new ClientModel();
        $mEmpresa   = new EmpresaModel();
        $mRelaciona = new EmpresaClienteModel();

        $empresa = $mEmpresa->find($id);

        $clientes = $mCliente->select('empresa_cliente.name, empresa_cliente.phone, empresa_cliente.id, empresa_cliente.name empresa_name, empresa_cliente.email, empresa.id id_empresa, relaciona.id relacionamento')
            ->join('empresa_relaciona_cliente relaciona', 'relaciona.id_cliente = empresa_cliente.id')
            ->join('empresa', 'empresa.id = relaciona.id_empresa')
            ->where('empresa.id', $id)
            ->where('relaciona.deleted_at IS NULL')
            ->where('empresa.deleted_at IS NULL')
            ->orderBy('empresa_cliente.id', 'ASC')
            ->findAll();



        $filename = "clientes.csv";
        $delimiter = ",";

        // Abrir o arquivo para escrita
        $file = fopen($filename, 'w');

        // Escrever o cabeçalho no arquivo CSV
        $header = array('id', 'Name', 'Email', 'phone');
        fputcsv($file, $header, $delimiter);

        // Escrever os dados no arquivo CSV
        foreach ($clientes as $key => $cliente) {
            $row = array(
                $cliente['id'],
                $cliente['name'],
                $cliente['email'],
                $cliente['phone']
            );
            fputcsv($file, $row, $delimiter);
        }

        // Fechar o arquivo
        fclose($file);

        // Definir o cabeçalho da resposta HTTP para download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Ler o arquivo e enviá-lo para o cliente
        readfile($filename);

        // Remover o arquivo CSV após o download
        unlink($filename);

        //return redirect()->back();
    }

    public function excluirRelacionamento($id)
    {
        $mRelaciona = new EmpresaClienteModel();

        $mRelaciona->delete($id);

        return redirect()->back();
    }
}
