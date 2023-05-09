<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;


class Participantes extends BaseController
{
    private $mEmpresa;
    private $mCliente;
    private $mEmpresaCliente;

    public function __construct()
    {
        $this->mEmpresa        = new EmpresaModel();
        $this->mCliente        = new ClientModel();
        $this->mEmpresaCliente = new EmpresaClienteModel();
    }
    public function index()
    {
        //
        $data['title'] = 'Participantes';
        
        //
        $data['mEmpresa'] = $this->mEmpresa;

        if ($list = $this->request->getGet('list')) :
            
            if($rowList = $this->mEmpresaCliente->where('id_empresa', $list)->select('id_cliente')->findAll()){
                
                $idCliente = $rowList[0]['id_cliente'];

            }else{
                
                $idCliente = 0;
            
            } ;

            $data['cliente'] = $this->mCliente->where('id', $idCliente)
                                        ->paginate();
            $data['pager']  = $this->mCliente->pager ;

        endif;

        return view('super/pages/participantes/index', $data);
    }
    public function search($idEmpresa)
    {
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
