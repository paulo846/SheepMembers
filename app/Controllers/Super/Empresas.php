<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Models\ConfigModel;
use App\Models\EmpresaModel;

class Empresas extends BaseController
{
    private $mEmpresa;
    private $mConfig;
    private $s3;

    public function __construct()
    {
        $this->mEmpresa = new EmpresaModel();
        $this->mConfig  = new ConfigModel();
        $this->s3 = new S3();
        helper('number');
    }
    public function index(){
        $data['title'] = 'Dashboard';
        //
        return view('newSuper/pages/dashboard/home', $data);
    }
    public function antigo(){
        //
        $data['title'] = 'Empresas 001';

        //
        $data['empresa'] = $this->mEmpresa->findAll();

        //
        return view('super/pages/empresa/index', $data);
    }
    public function edit($id)
    {
        //
        $data['title'] = 'Editar empresa';

        //
        if(!$dadosEmpresa = $this->mEmpresa->find($id)){
            return redirect()->to('/superadmin/empresas');
        }
        if(!$configEmpresa = $this->mConfig->where('id_empresa', $id)->findAll($id)){
            return redirect()->to('/superadmin/empresas');
        }

        $data['empresa'] = $dadosEmpresa;
        $data['config']  =  $configEmpresa[0];
        $data['s3']      = $this->s3;

        //
        return view('super/pages/empresa/edit', $data);
    }

    public function new()
    {
        //
        $data['title'] = 'Nova empresa';

        //
        return view('super/pages/empresa/novo', $data);
    }
}
