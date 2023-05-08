<?php

namespace App\Controllers\Client;

use App\Models\ClientModel;
use App\Models\MessagesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        //
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
        //
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

    /** ENVIA MENSAGEM */
    public function send($empresa)
    {
        $input = $this->request->getPost();
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

    public function avisos()
    {
        $data[] = [
            'title' => 'Avisos!!',
            'text'  => '<b>O que é Lorem Ipsum?</b><br>
            Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.',
        ];
        return $this->respond($data, 200);
    }

    public function verify()
    {
        if (session('loggedClient')) {
            echo '0';
        } else {
            $session = session();
            $session->setTempdata('error', 'Tempo de sessão expirado!!', 3);
            //$session->setFlashdata('error', 'Email não encontrado!');
            echo '1';
        }
    }
}