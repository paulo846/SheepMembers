<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;

class Participantes extends BaseController
{
    public function index()
    {
        //
        $data['title'] = 'Participantes';
        //
        return view('super/pages/home', $data);

    }
    public function search($idEmpresa){
        //
        $data['title'] = 'Buscar participantes';
        //
        return view('super/pages/home', $data);
    }
    public function edit($id)
    {
        //
        $data['title'] = 'Editar participante';
        //
        return view('super/pages/home', $data);
    }
    public function new()
    {
        //
        $data['title'] = 'Novo participante';
        //
        return view('super/pages/home', $data);
    }
}
