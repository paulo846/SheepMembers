<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        return view('usuarios/panel/pages/idioma');
    }

    public function lang()
    {
        $session = session();
        $locale  = service('request')->getLocale();
        $session->remove('lang');
        $session->set('lang', $locale);
        return redirect()->back();
    }
    public function teste(){
        
        
        echo date('h:i:s');
    }
    /*public function pt_br0()
    {
        helper('url');
        $mConfig = new ConfigModel();
        $builder = $mConfig->where('slug', get_subdomain(base_url()))->findAll();
        $data = array();

        if (count($builder)) {
            $data['name']        = $builder[0]['title'];
            $data['description'] = $builder[0]['description'];
            $data['logo']        = $builder[0]['logo'];
            $data['fundo']       = $builder[0]['fundo'];
            $data['link_venda']  = $builder[0]['link_venda'];
            $data['id']          = $builder[0]['id'];
            $data['stream_pt']       = $builder[0]['stream_pt'];
        } else {
            $data['name']        = 'Sheep Members';
            $data['description'] = false;
            $data['logo']        = false;
            $data['fundo']       = false;
            $data['link_venda']  = false;
            $data['id']          = null;
            $data['stream_pt']   = false;
        }

        $data['title'] = 'Members | ' . $data['name'];
        return view('usuarios/panel/layout', $data);
    }*/
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
