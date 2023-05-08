<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\EmpresaModel;

class Participantes extends BaseController
{
    private $mEmpresa;

    public function __construct()
    {
        $this->mEmpresa = new EmpresaModel();
    }
    public function index()
    {
        //
        $data['title'] = 'Participantes';
        //

        $data['mEmpresa'] = $this->mEmpresa ;

        return view('super/pages/participantes/index', $data);

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
