<?php

namespace App\Controllers\Api;

use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    protected $request;
    private $mConfig;
    private $mParticipante;
    private $mRelaciona;
    private $mEmpresa;

    public function __construct()
    {
        $this->request = service('request');

        $this->mConfig       = new ConfigModel();
        $this->mEmpresa      = new EmpresaModel();
        $this->mParticipante = new ClientModel();
        $this->mRelaciona    = new EmpresaClienteModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        //
        return $this->response->setJSON([
            'NAME' => 'SHEEPMEMBERS',
            'RESP' => 200
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
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

    public function teste()
    {
        return $this->respondCreated(['Usuário criado!']);
    }

    public function exclui($idEmpresa = null){
        // Verifica se o header "apikey" está presente na requisição
        $apiKey = $this->request->getHeaderLine('apikey');

        if (!$apiKey || $apiKey !== '7a11b931-c3df-4010-bf12-88c7a48af52f') {
            return $this->fail(['03 - API Key inválida!']); // Adapte a mensagem de erro conforme necessário
        }

        if (!$idEmpresa) {
            return $this->fail(['01 - Empresa não informada!']);
        }

        if (!$this->mEmpresa->where('id', $idEmpresa)->countAllResults()) {
            return $this->fail(['02 - Empresa não informada!']);
        }

        $email = $this->request->getPost('email');


    }

    public function cliente($idEmpresa = null)
    {
        // Verifica se o header "apikey" está presente na requisição
        $apiKey = $this->request->getHeaderLine('apikey');

        if (!$apiKey || $apiKey !== '7a11b931-c3df-4010-bf12-88c7a48af52f') {
            return $this->fail(['03 - API Key inválida!']); // Adapte a mensagem de erro conforme necessário
        }

        if (!$idEmpresa) {
            return $this->fail(['01 - Empresa não informada!']);
        }

        if (!$this->mEmpresa->where('id', $idEmpresa)->countAllResults()) {
            return $this->fail(['02 - Empresa não informada!']);
        }

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

            if ($rel = $this->mRelaciona->where(['id_cliente' => $id, 'id_empresa' => $idEmpresa])->findAll()) {

                //dados para relacionamento
                $this->mRelaciona->delete($rel[0]['id']);

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $id,
                    'id_empresa' => $idEmpresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];

                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);

                //$email = new Ses;
                //$email->acessoInicial(['name' => $input['name'], 'email' => $input['email']], $idEmpresa);

                return $this->respond(['msg' => 'O usuário foi atualizado mas não houve envio no whatsapp!']);
            } else {

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => $id,
                    'id_empresa' => $idEmpresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];

                //cadastra novo relacionamento
                $this->mRelaciona->save($relaciona);

                //$email = new Ses;
                //$email->acessoInicial(['name' => $input['name'], 'email' => $input['email']], $idEmpresa);

                return $this->respondCreated(['msg' => 'Ação realizada com sucesso!']);
            }
        } catch (\Exception $e) {
            //resposta 400 - Qualquer erro
            return $this->fail($e->getMessage());
        }
    }
}
