<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Libraries\S3;
use App\Models\CarrosselModel;
use App\Models\ConfigModel;
use App\Models\EmpresaModel;
use App\Models\GravacoesModel;

class Empresas extends BaseController
{
    private $mEmpresa;
    private $mConfig;
    private $s3;
    private $mCarrosseis;

    public function __construct()
    {
        $this->mEmpresa = new EmpresaModel();
        $this->mConfig  = new ConfigModel();
        $this->mCarrosseis = new CarrosselModel();

        $this->s3 = new S3();
        helper('number');
    }
    public function index(){
        $data['title'] = 'Clientes';
        $data['empresas'] = $this->mEmpresa->findAll();
        //
        return view('newSuper/pages/clientes/home', $data);
    }

    /*public function antigo(){
        //
        $data['title'] = 'Empresas 001';

        //
        $data['empresa'] = $this->mEmpresa->findAll();

        //
        return view('super/pages/empresa/index', $data);
    }*/

    public function edit($id= null){
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
        
        $data['carrosseis'] = $this->mCarrosseis->where('id_empresa', $dadosEmpresa['id'])->findAll();
        $data['gravacoes']  = new GravacoesModel();

        $data['config']  =  $configEmpresa[0];
        $data['s3']      = $this->s3;

        //
        return view('newSuper/pages/clientes/editar', $data);

    }
    public function edit0($id)
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
