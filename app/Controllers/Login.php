<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;

class Login extends BaseController
{
    public function index()
    {
        
        $mConfig = new ConfigModel();
        $s3 = new S3;


        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();

        $data = array();
        if (count($builder)) {
            $data['name']        = $builder[0]['title_pt'];
            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . time() : false;
            $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) : false;
            $data['link_venda']  = $builder[0]['link_venda'];
        } else {
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
        }

        $data['title'] = 'Login | ' . $data['name'];


        /*$bi = new Ses;

        $e['sender']    = 'contato@conect.app';
        $e['recipient'] = 'igrsysten@gmail.com';
        $e['subject']   = 'Nova conta!';
        $e['body']      = view('usuarios/emails/bem-vindo');

        $bi->sendEmail($e);*/


        return view('usuarios/login/pages/login', $data);
    }

    public function recover()
    {
        helper('url');
        $mConfig = new ConfigModel();
        $s3 = new S3;


        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();

        $data = array();
        if (count($builder)) {
            $data['name']        = $builder[0]['title_pt'];
            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . time() : false;
            $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) : false;
            $data['link_venda']  = $builder[0]['link_venda'];
        } else {
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
        }

        $data['title'] = 'Login | ' . $data['name'];

        // Imprime o subdominio
        //echo get_subdomain(base_url()); // imprime "radicais"

        return view('usuarios/login/pages/recupera', $data);
    }

    public function auth()
    {
        $mClient = new ClientModel();
        try {
            $mClient->authclient($this->request->getPost());
            return redirect()->to(site_url());
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to(site_url('login'));
    }
}
