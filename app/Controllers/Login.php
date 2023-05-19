<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;
use Exception;

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
            $data['id_empresa']  = $builder[0]['id_empresa'];
            $data['name']        = $builder[0]['title_pt'];
            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at']  : false;
            $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
            $data['linkVenda']   = $builder[0]['link_venda'];
            $data['analytics']   = $builder[0]['analytics'];

        } else {
            //se não acha as configurações retorna dados padrão
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['linkVenda']   = false;
            $data['analytics']   = false;
            $data['id_empresa']  = false;


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
            $data['id_empresa'] = $builder[0]['id_empresa'];
            $data['name']        = $builder[0]['title_pt'];
            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at']  : false;
            $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
            $data['link_venda']  = $builder[0]['link_venda'];
            $data['analytics'] = $builder[0]['analytics'];

        } else {
            $data['id_empresa']  = false;
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
            $data['analytics']   = false;
        }
        $data['title'] = 'Login | ' . $data['name'];
        return view('usuarios/login/pages/recupera', $data);
    }

    public function auth()
    {
        try {
            $mClient = new ClientModel();
            $mClient->authclient($this->request->getPost());
            return redirect()->to(site_url());
        } catch (\Exception $e) {
            print_r($e->getMessage());
            return redirect()->back();
        }
    }

    public function reloadpass(){
        $input = $this->request->getPost();

        
        $clientsModel = new ClientModel();

        try{
            $builder = $clientsModel->where('email', $input['email'])->findAll();
            if(count($builder)){ 
                $data[] = [
                    'email'    => $input['email'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];
                
                $clientsModel->updateBatch($data, 'email');
                
                $ses = new Ses();

                $ses->acessoInicialGeral($data[0]);

                
                session()->setFlashdata('success', lang('Panel.recuperado')); 
                return redirect()->to('/login');

            }else{
                throw new Exception('Cliente não cadastrado.');
            }
        }catch(\Exception $e){
            session()->setFlashdata('error', 'Erro ao recuperar conta. <br>'. $e->getMessage());
            return redirect()->to('/login');
        }
    }


    public function logout()
    {
        session_destroy();
        return redirect()->to(site_url('login'));
    }
}
