<?php

namespace App\Controllers\Client;

use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ComentariosModel;
use App\Models\ConfigModel;
use App\Models\MessagesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Api extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->request = service('request');
    }
    
    use ResponseTrait;

    /**
     * POSSIVEL BATE PAPO
     */
    public function messages($empresa)
    {
        $mMessage = new MessagesModel();
        $mClient = new ClientModel();
        $builder = $mMessage->where('id_empresa', $empresa)->orderBy('id', 'ASC')->findAll(250);
        $data = array();
        foreach ($builder as $row) {
            $nameClient = $mClient->find($row['id_user'])['username'];
            $data[] = [
                'image'   => '/assets/img/200.png',
                'name'    => esc($nameClient),
                'message' => $row['message']
            ];
        }
        return $this->respond($data, 200);
    }

    /**
     * ENVIA MENSAGEM DO BATE PAPO
     * */
    public function send($empresa)
    {
        $request = service('request');
        $input = $request->getPost();
        $mMessage = new MessagesModel();
        $request = service('request');
        $data = [
            'id_empresa' => $empresa,
            'id_user'    => session('idUser'),
            'lang'       => service('language')->getLocale(),
            'message'    => alter_text_emoji($input['message']),
            'ip'         => $request->getIPAddress()
        ];
        $mMessage->save($data);
    }

    /**
     * MOSTRA AVISOS
     */
    public function avisos($id = null)
    {
        $mConfig = new ConfigModel();
        $builder = $mConfig->where('id_empresa', $id)->select('alertas')->find()[0];
        $data[] = [
            'title' => 'Avisos!!',
            'text'  => $builder['alertas'],
        ];
        return $this->respond($data, 200);
    }

    /**
     * VERIFICA USUÁRIO LOGADO
     */
    public function verify(int $id)
    {
        $mClient = new ClientModel();
        $builder = $mClient->find($id);
        if ($builder) {
            if ($builder['bloqueio']) {
                session();
                session_destroy();
            }
        } else {
            session();
            session_destroy();
        }

        if (session('loggedClient')) {
            return $this->respond(['status' => 'logado'], 200);
        } else {
            $session = session();
            $session->setTempdata('error', 'Não passe seu login para terceiros, evite bloqueios!', 10);
            return $this->fail(['status' => 'Erro de login']);
        }
    }

    /**
     * ATUALIZA PERFIL
     */
    public function perfil()
    {
        $input = $this->request->getPost();

        try {
            $updatedClients[] = [
                'email' => $input['email'],
                'password' => password_hash($input['pass'], PASSWORD_BCRYPT)
            ];

            $clientsModel = new ClientModel();

            $clientsModel->updateBatch($updatedClients, 'email');

            session_destroy();
            return $this->respond(['message' => 'Alteração realizada com sucesso!']);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage());
        }
        
    }

    /**
     * ENVIA COMENTÁRIO
     */
    public function comentar()
    {
        try {
            $input = $this->request->getPost();
            $data = [
                'id_empresa'  => $input['idEmpresa'],
                'id_gravacao' => $input['idFilme'],
                'id_usuario'  => $input['idUser'],
                'aprovado'    => false,
                'comentario'  => $input['comentario']
            ];

            $mComentarios = new ComentariosModel();
            $id           = $mComentarios->insert($data);

            $usuarios = new ClientModel();
            //envia email!
            $email = new Ses;

            $email->sendEmail([
                'sender' => 'contato@sheepmembers.com',
                'sender_name' => 'SHEEP MEMBERS',
                'recipient' => 'sheepmembers@gmail.com',
                'subject' => "Novo comentário - {$id}",
                'body'    => $input['comentario']
            ]);


            //return $this->respond($data);

            return redirect()->back();

        } catch (\Exception $e) {
            return $this->fail(['err' => $e->getMessage()]);
        }
    }

    /**
     * DELETA COMENTÁRIO
     */
    public function deleteComent($idUser, $id)
    {
        try {
            $mComentarios = new ComentariosModel();
            /*$builder = $mComentarios->where(['id_usuarios' => $idUser, 'id' => $id])->findAll();
            
            if (!count($builder)) {
                throw new Exception('Registro não encontrado!');
            }*/
            
            $mComentarios->delete($id);
            //return $this->respond(['succ' => 'Deletado com sucesso']);
            return redirect()->back();
        } catch (\Exception $e) {
            $this->fail(['err' => $e->getMessage()]);
        }
    }
}
