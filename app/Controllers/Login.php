<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;

class Login extends BaseController
{
    private $urlClient ;
    public function __construct()
    {
        $this->urlClient = $_SERVER['HTTP_HOST'];
        helper('url');

    }
    public function index()
    {
        //dados de configuração no banco de dados
        $mConfig = new ConfigModel();
        //imagens no s3
        $s3 = new S3;
        //busca configurações através do dominio
        $builder = $mConfig->where('slug', $this->urlClient)->findAll();
        //define dados de retorno como array
        $data = array();
        //se tem configuração retorna em PT BR
        if (count($builder)) {
            $data['name']        = $builder[0]['title_pt'];
            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . time() : false;
            $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) : false;
            $data['link_venda']  = $builder[0]['link_venda'];
        } else {
            //se não acha as configurações retorna dados padrão
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
        }
        //titulo da página
        $data['title'] = 'Login | ' . $data['name'];
        //retorna view
        return view('usuarios/login/pages/login', $data);
    }

    public function recover()
    {
        
        $mConfig = new ConfigModel();
        $s3 = new S3;
        $builder = $mConfig->where('slug', $this->urlClient)->findAll();
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
