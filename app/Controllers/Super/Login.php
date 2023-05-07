<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\SuperadminModel;

class Login extends BaseController
{
    public function index()
    {
        //
        return view('super/login/pages/home', ['title' => ' ']);
    }

    public function auth(){
        //print_r($session->getFlashdata('error'));
        try{
            $mSuper = new SuperadminModel();
            $mSuper->authsuper($this->request->getPost());
            return redirect()->to('superadmin');
        }catch(\Exception $e){
            return redirect()->back();
        }
    }
}
