<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ConfigModel;

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

            $data['analytics'] = $builder[0]['analytics'];

            if (session()->lang == 'pt-BR') {
                
                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at'] : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream_pt']   = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
            } elseif (session()->lang == 'en') {

                $data['name']        = $builder[0]['title_en'];
                $data['description'] = $builder[0]['description_en'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at']  : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream_pt']   = ($builder[0]['stream_en']) ? $builder[0]['stream_en'] : false ;
                
            } elseif (session()->lang == 'es') {
                
                $data['name']        = $builder[0]['title_es'];
                $data['description'] = $builder[0]['description_es'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at'] : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream_pt']   = ($builder[0]['stream_es']) ? $builder[0]['stream_es'] : false ;

            } else {

                $data['name']        = $builder[0]['title_pt'];
                $data['description'] = $builder[0]['description_pt'];
                $data['logo']        = ($builder[0]['logo_pt']) ? $s3->getImageUrl($builder[0]['logo_pt']) . '?t=' . $builder[0]['updated_at'] : false;
                $data['fundo']       = ($builder[0]['fundo']) ? $s3->getImageUrl($builder[0]['fundo']) . '?t=' . $builder[0]['updated_at']  : false;
                $data['link_venda']  = $builder[0]['link_venda'];
                $data['id']          = $builder[0]['id'];
                $data['stream_pt']   = ($builder[0]['stream_pt']) ? $builder[0]['stream_pt'] : false;
            }
        } else {

            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
            $data['id']          = null;
            $data['stream_pt']   = false;
            $data['analytics']   = false;
        }

        $data['title'] = 'Members | ' . $data['name'];
        return view('usuarios/panel/layout', $data);
    }

    /*public function teste()
    {
        $mMessage = new MessagesModel();
        $faker = \Faker\Factory::create();
        try {
            for ($i = 1; $i < 10000; $i++) {
                $data = [
                    'id_empresa' => 1,
                    'id_user'    => 1,
                    'message'    => $faker->name()
                ];
                $mMessage->insert($data);
                $dd[] = $data;
            }
            echo "<pre>";
            print_r($dd);
            echo "</pre>";
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        echo $mMessage->countAllResults();
    }*/
}
