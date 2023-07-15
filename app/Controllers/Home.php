<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ClientModel;
use App\Models\ComentariosModel;
use App\Models\ConfigModel;
use App\Models\EmpresaModel;
use App\Models\GravacoesModel;

class Home extends BaseController
{
    public function __construct()
    {
        //carrega helper
        helper('url');
    }

    /*public function index()
    {
        //return view('usuarios/panel/pages/idioma');
    }*/

    public function lang()
    {
        $session = session();
        $locale  = service('request')->getLocale();
        $session->remove('lang');
        $session->set('lang', $locale);
        return redirect()->back();
    }
    public function teste()
    {
        echo date('h:i:s');
    }

    public function index()
    {

        //model de configuração
        $mConfig = new ConfigModel();

        //define data como array
        $data = array();

        //biblioteca configurada do S3
        $s3 = new S3();

        //Começa as ações de dados de configuações para retornar na tela
        //busca informações através da url
        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();

        //conta resultados
        if (count($builder)) {

            /**
             * CONFIGURAÇÕES PADRÃO DA PLATAFORMA
             * DE ACORDO COM 
             */
            //id da empresa
            $data['idEmpresa'] = $builder[0]['id_empresa'];

            //dados do analytics header
            $data['analytics'] = $builder[0]['analytics'];

            //suporte
            $data['suporte'] = $builder[0]['whatsapp'];

            //dados do analytics footer
            $data['analyticsFooter'] = $builder[0]['scripts_footer'];

            //imagem de fundo 
            $data['fundo']       = ($builder[0]['background']) ? $s3->getImageUrl($builder[0]['background']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            //imagem logo
            $data['logo']        = ($builder[0]['logo']) ? $s3->getImageUrl($builder[0]['logo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            //imagem favicon
            $data['favicon']        = ($builder[0]['favicon']) ? $s3->getImageUrl($builder[0]['favicon']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            //imagem capa
            $data['capa']        = ($builder[0]['capa']) ? $s3->getImageUrl($builder[0]['capa']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            //VERIFICA SE TEM LINK DE TRANSMISSÃO NOS IDIOMAS
            $data['vStrPt'] = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
            $data['vStrEn'] = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false;
            $data['vStrEs'] = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false;;

            //informações para o idioma em português
            if (session()->lang == 'pt-BR') {

                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
                $data['capaVideo']   = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) : false;

                //informações para o idioma em inglês
            } elseif (session()->lang == 'en') {

                $data['name']        = $builder[0]['title_en'];
                $data['description'] = $builder[0]['description_en'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false;
                $data['capaVideo']   = ($builder[0]['logo_en']) ? $s3->getImageUrl($builder[0]['logo_en']) : false;


                //informações para o idioma em espanhol
            } elseif (session()->lang == 'es') {
                $data['name']        = $builder[0]['title_es'];
                $data['description'] = $builder[0]['description_es'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false;
                $data['capaVideo']   = ($builder[0]['logo_es']) ? $s3->getImageUrl($builder[0]['logo_es']) : false;

                //informações para o idioma padrão, PT BR
            } else {
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
                $data['capaVideo']   = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) : false;
            }
        } else {
            //se não houver resulstado na busca pela url, volta a página de login com um erro traduzido
            session()->setFlashdata('error', lang('Alertas.erroPlataforma'));
            return redirect()->to('login');
        }

        //verificar de ainda precisa desse bloco
        $data['live'] = true;
        if ($data['live']) {
            $data['classHeader'] = "header--hidden";
        } else {
            $data['classHeader'] = "header--static";
        }

        /////
        $mEmpresa     = new EmpresaModel();
        $nameEvento   = $mEmpresa->select('evento')->find($builder[0]['id_empresa'])['evento'];

        //titulo da página
        $data['title'] = 'Members | ' . $nameEvento;

        //view
        return view('usuarios/newPainel/pages/home', $data);
    }




    public function filme($slug = null)
    {
        helper('url');
        $mConfig = new ConfigModel();


        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();
        $data = array();

        $s3 = new S3();

        $data['s3'] = $s3;

        if (count($builder)) {
            $data['idEmpresa'] = $builder[0]['id_empresa'];

            $data['analytics'] = $builder[0]['analytics'];

            //suporte
            $data['suporte'] = $builder[0]['whatsapp'];
            
            //dados do analytics footer
            $data['analyticsFooter'] = $builder[0]['scripts_footer'];

            $data['fundo']       = ($builder[0]['background']) ? $s3->getImageUrl($builder[0]['background']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['logo']        = ($builder[0]['logo']) ? $s3->getImageUrl($builder[0]['logo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['favicon']        = ($builder[0]['favicon']) ? $s3->getImageUrl($builder[0]['favicon']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['capa']        = ($builder[0]['capa']) ? $s3->getImageUrl($builder[0]['capa']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['analytics'] = $builder[0]['analytics'];

            $mGravacao = new GravacoesModel();

            $gravacao = $mGravacao->where('slug', $slug)->findAll();

            if (!$gravacao) {
                //mensagem de gravação não encontrada
                return redirect()->to(site_url());
                exit();
            }

            $data['description'] = $gravacao[0]['description'];
            $data['filme']       = $gravacao[0];


            $mComentarios = new ComentariosModel();
            $data['comentarios'] = $mComentarios;

            $data['live'] = true;
            if ($data['live']) {
                $data['classHeader'] = "header--hidden";
            } else {
                $data['classHeader'] = "header--static";
            }
        }

        $mUsuarios = new ClientModel();

        $data['userComents'] = $mUsuarios;

        $data['title'] = "SheepMembers | " . $gravacao[0]['title'];
        return view('usuarios/newPainel/pages/filme', $data);
    }













    public function perfil()
    {
        return redirect()->to('/');
        exit;

        helper('url');
        $mConfig = new ConfigModel();

        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();
        $data = array();

        $s3 = new S3();

        if (count($builder)) {
            $data['analytics'] = $builder[0]['analytics'];
            if (session()->lang == 'pt-BR') {
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['background']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream']) ? $builder[0]['stream'] : false;
            } elseif (session()->lang == 'en') {

                $data['name']        = $builder[0]['title_en'];
                $data['description'] = $builder[0]['description_en'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false;
            } elseif (session()->lang == 'es') {

                $data['name']        = $builder[0]['title_es'];
                $data['description'] = $builder[0]['description_es'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false;
            } else {
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream']) ? $builder[0]['stream'] : false;
            }
        } else {
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
            $data['id']          = null;
            $data['stream']   = false;
            $data['analytics']   = false;
        }

        $data['live'] = false;
        if ($data['live']) {
            $data['classHeader'] = "header--hidden";
        } else {
            $data['classHeader'] = "header--static";
        }

        $data['title'] = 'Members | ' . $data['name'];
        return view('usuarios/newPainel/pages/perfil', $data);
    }
}
