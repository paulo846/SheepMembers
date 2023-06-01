<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ClientModel;
use App\Models\ComentariosModel;
use App\Models\ConfigModel;
use App\Models\GravacoesModel;

class Home extends BaseController
{

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
        helper('url');
        $mConfig = new ConfigModel();

        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();
        $data = array();

        $s3 = new S3();

        if (count($builder)) {

            $data['idEmpresa'] = $builder[0]['id_empresa'];

            $data['analytics'] = $builder[0]['analytics'];

            $data['fundo']       = ($builder[0]['background']) ? $s3->getImageUrl($builder[0]['background']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['logo']        = ($builder[0]['logo']) ? $s3->getImageUrl($builder[0]['logo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['favicon']        = ($builder[0]['favicon']) ? $s3->getImageUrl($builder[0]['favicon']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['capa']        = ($builder[0]['capa']) ? $s3->getImageUrl($builder[0]['capa']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;



            if (session()->lang == 'pt-BR') {

                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
                $data['capaVideo']   = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) : false;
            } elseif (session()->lang == 'en') {

                $data['name']        = $builder[0]['title_en'];
                $data['description'] = $builder[0]['description_en'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false;
            } elseif (session()->lang == 'es') {

                $data['name']        = $builder[0]['title_es'];
                $data['description'] = $builder[0]['description_es'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false;
            } else {
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']      = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
                $data['capaVideo']   = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) : false;
            }
        } else {

            //alerta de erros
            session()->setFlashdata('error', lang('Alertas.erroPlataforma'));
            return redirect()->to('login');

            /*$data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
            $data['id']          = null;
            $data['stream']   = false;
            $data['analytics']   = false;
            $data['capa'] = false ;
            $data['capaVideo'] = false ;*/
        }

        $data['live'] = true;
        if ($data['live']) {
            $data['classHeader'] = "header--hidden";
        } else {
            $data['classHeader'] = "header--static";
        }

        $data['title'] = 'Members | ' . $data['name'];
        return view('usuarios/newPainel/pages/home', $data);
    }




    public function filme($slug = null)
    {
        helper('url');
        $mConfig = new ConfigModel();
        

        $builder = $mConfig->where('slug', $_SERVER['HTTP_HOST'])->findAll();
        $data = array();

        $s3 = new S3();

        $data['s3'] = $s3 ;

        if (count($builder)) {
            $data['idEmpresa'] = $builder[0]['id_empresa'];

            $data['analytics'] = $builder[0]['analytics'];

            $data['fundo']       = ($builder[0]['background']) ? $s3->getImageUrl($builder[0]['background']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['logo']        = ($builder[0]['logo']) ? $s3->getImageUrl($builder[0]['logo']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['favicon']        = ($builder[0]['favicon']) ? $s3->getImageUrl($builder[0]['favicon']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['capa']        = ($builder[0]['capa']) ? $s3->getImageUrl($builder[0]['capa']) . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;

            $data['analytics'] = $builder[0]['analytics'];

            $mGravacao = new GravacoesModel();

            $gravacao = $mGravacao->where('slug', $slug)->findAll();

            if(!$gravacao){
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

        $data['title'] = "SheepMembers | ".$gravacao[0]['title'];
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
                $data['logo']        = ($builder[0]['logo_pt']) ? url_cloud_front() . $builder[0]['logo_pt'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['fundo']       = ($builder[0]['fundo']) ? url_cloud_front() . $builder[0]['fundo'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false;
            } elseif (session()->lang == 'es') {

                $data['name']        = $builder[0]['title_es'];
                $data['description'] = $builder[0]['description_es'];
                $data['logo']        = ($builder[0]['logo_pt']) ? url_cloud_front() . $builder[0]['logo_pt'] . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['fundo']       = ($builder[0]['fundo']) ? url_cloud_front() . $builder[0]['fundo'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream']   = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false;
            } else {
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['logo']        = ($builder[0]['logo_pt']) ? url_cloud_front() . $builder[0]['logo_pt'] . '?t=' . converterParaTimestamp($builder[0]['updated_at']) : false;
                $data['fundo']       = ($builder[0]['fundo']) ? url_cloud_front() . $builder[0]['fundo'] . '?t=' . converterParaTimestamp($builder[0]['updated_at'])  : false;
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
