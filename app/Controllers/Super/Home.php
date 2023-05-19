<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class Home extends BaseController
{
    public function index()
    {

        $data['title'] = 'Dashboard';
        //
        return view('newSuper/template/template', $data);


    }
    public function clientes(){
        $mClients = new ClientModel();
        
        $data['title'] = 'Clientes';
        //
        $data['clients'] = $mClients->findAll();
        
        return view('super/pages/clientes', $data);
    }
    public function sair(){
        session_destroy();
        return redirect()->to('superadmin/logout');
    }
}
