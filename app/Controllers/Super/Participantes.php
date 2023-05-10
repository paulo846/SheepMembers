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
        //titulo da página
        $data['title'] = 'Participantes';

        //dados da empresa
        $data['mEmpresa'] = $this->mEmpresa;

        //vefifica se o id da empresa foi enviado
        if ($list = $this->request->getGet('list')) :
            //busca os relacionamentos da empresa
            $rowList = $this->mEmpresaCliente->where('id_empresa', $list)->select('id_cliente')->findAll();
            
            if ($rowList) {
                //define id do cliente para a busca
                foreach ($rowList as $rowIdsClientes) {
                    $idCliente[] = $rowIdsClientes['id_cliente'];
                }
            } else {
                //define id do cliente como zero
                $idCliente = [0];
            };

            $data['cliente'] = $this->mCliente->whereIn('id', $idCliente)->paginate();
            $data['pager']  = $this->mCliente->pager;

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
