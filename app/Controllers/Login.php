<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Libraries\Ses;
use App\Models\ClientModel;
use App\Models\ConfigModel;
use App\Models\EmpresaModel;
use Exception;

class Login extends BaseController
{
    private $urlClient;
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
            $mEmpresa     = new EmpresaModel();
            $nameEvento   = $mEmpresa->select('evento')->find($builder[0]['id_empresa'])['evento'];
            $data['name'] = $nameEvento;

            $data['id_empresa']  = $builder[0]['id_empresa'];
            $data['suporte']     = $builder[0]['whatsapp'];


            $data['description'] = $builder[0]['description_pt'];
            $data['logo']        = ($builder[0]['logo']) ? url_cloud_front().$builder[0]['logo'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['fundo']       = ($builder[0]['background']) ? url_cloud_front().$builder[0]['background'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['favicon']       = ($builder[0]['favicon']) ? url_cloud_front().$builder[0]['favicon'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['linkVenda']   = $builder[0]['link_venda'];
            $data['analytics']   = $builder[0]['analytics'];
            $data['analyticsFooter'] = $builder[0]['scripts_footer'];
        } else {
            //se não acha as configurações retorna dados padrão
            $data['name']        = 'Sheep Members';
            $data['favicon']     = false;
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['linkVenda']   = false;
            $data['analytics']   = false;
            $data['id_empresa']  = false;
            $data['analyticsFooter'] = false;
            $data['suporte'] = null;
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
            $data['logo']        = ($builder[0]['logo']) ? url_cloud_front().$builder[0]['logo'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['fundo']       = ($builder[0]['background']) ? url_cloud_front().$builder[0]['background'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['favicon']       = ($builder[0]['favicon']) ? url_cloud_front().$builder[0]['favicon'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
            $data['link_venda']  = $builder[0]['link_venda'];
            $data['analytics'] = $builder[0]['analytics'];
            $data['analyticsFooter'] = $builder[0]['scripts_footer'];
        } else {
            //alerta de erros
            session()->setFlashdata('error', lang('Alertas.idEmpresa'));
            return redirect()->to('/login');
        }
        
        $data['suporte'] = false ;

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

    public function reloadpass()
    {
        //recupera dados enviados
        $input = $this->request->getPost();

        //model participante
        $clientsModel = new ClientModel();

        //tratamento de erros
        try {
            //verifica se o id está preenchido
            if (!isset($input['idEmpresa'])) {
                //erro traduzido para a linguagem escolhida
                //url invalída
                throw new Exception(lang('Alertas.idEmpresa'));
            }

            //bucas dados do participante com base no email
            $builder = $clientsModel->where('email', $input['email'])->findAll();

            //se encontra um
            if (count($builder)) {
                //dados para alteração de senha
                $data[] = [
                    'email'    => $input['email'],
                    'password' => password_hash('mudar123', PASSWORD_BCRYPT)
                ];

                //altera senha para a senha padrão
                $clientsModel->updateBatch($data, 'email');


                //busca dados da empresa
                $mConfig    = new ConfigModel();
                $plataforma = $mConfig->where('id_empresa', $input['idEmpresa'])->findAll();

                //monta email
                $view = view('usuarios/emails/bem-vindo', [
                    'plataforma' => $plataforma[0]['title_pt'],
                    'logo'       => url_cloud_front() . 'assets/admin/img/logo-1.png',
                    'nome'       => $builder[0]['name'],
                    'link'       => $plataforma[0]['slug'],
                    'email'      => $input['email']
                ]);

                //envia email de boas vindas!
                $email = new Ses;
                $email->sendEmail([
                    'sender' => 'contato@sheepmembers.com',
                    'sender_name' => 'SHEEP MEMBERS',
                    'recipient' => $input['email'],
                    'subject' => 'Recuperação de senha - ' . ucfirst($plataforma[0]['title_pt']),
                    'body'    => $view
                ]);


                if ($builder[0]['phone']) {
                    $msg = "Olá {$builder[0]['name']},
Segue os dados da sua conta.

Link da plataforma: https://{$plataforma[0]['slug']}

*Login:* {$input['email']}

*Senha:* mudar123

Qualquer dúvida estamos a disposição atravéz do WhatsApp disponibilizado no site.";
                    whatsapp(formatPhoneNumber($builder[0]['phone']), $msg);
                }

                //mensagem de sucesso
                session()->setFlashdata('success', lang('Panel.recuperado'));
                //redireciona
                return redirect()->to('/login');
            } else {
                //usuário não encontrado
                throw new Exception(lang('Alertas.naoEncontrado'));
            }
        } catch (\Exception $e) {
            //alerta de erros
            session()->setFlashdata('error', lang('Alertas.erroRecuperacao') . '<br>' . $e->getMessage());
            return redirect()->to('/login');
        }
    }


    public function logout()
    {
        session_destroy();
        return redirect()->to(site_url('login'));
    }
}
