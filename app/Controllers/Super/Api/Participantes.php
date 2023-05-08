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

    public function index()
    {
        //
        $this->request = service('request');

        $this->mConfig       = new ConfigModel();
        $this->mEmpresa      = new EmpresaModel();
        $this->mParticipante = new ClientModel();
        $this->mRelaciona    = new EmpresaClienteModel();
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
            if ($id = $this->mParticipante->where('email', $input['email'])->findAll()) {
                //dados para atualização
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

            //dados para relacionamento
            $relaciona = [
                'id_cliente' => $id,
                'id_empresa' => $input['empresa'],
                'vencimento' => ($input['vencimento']) ? $input['vencimento'] : 12,
            ];

            //cadastra novo relacionamento
            $this->mRelaciona->save($relaciona);

            //busca dados da empresa
            $plataforma = $this->mConfig->where('id_empresa', $input['empresa'])->findAll();

            //html
            $html = "<h3>Email teste</h3>";
            $html .= "<p>{$input['name']}, nesse email contém os dados de acesso a plataforma para você assistir ao seu evento!</p>";
            $html .= "Dados de acesso:
            <ul>
                <li><b>Link da plataforma: {$plataforma[0]['slug']}</b></li>
                <li><b>Seu email:</b> {$input['email']}</li>
                <li><b>Sua senha:</b> mudar123</li>
            </ul>";

            //envia email de boas vindas!
            $email = new Ses() ;
            $email->sendEmail([
                'sender' => 'contato@conect.app',
                'recipient' => $input['email'],
                'subject' => 'Bem vindo!',
                'body'    => $html
            ]);

            //resposta 201 SUCESSO
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
