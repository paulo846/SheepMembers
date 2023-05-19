<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;

class Home extends BaseController
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

        $data['title'] = 'Dashboard';
        //
        return view('newSuper/pages/dashboard/home', $data);
    }
    public function alunos()
    {
        //dados da empresa
        //$data['mEmpresa'] = $this->mEmpresa;
        $data['totalAlunos'] = $this->mCliente->countAllResults();

        $this->mCliente->orderBy('id', 'DESC');

        if ($search = $this->request->getGet('s')) {
            $this->mCliente->like('name', $search)
                            ->orLike('email', $search);
        }

        $data['cliente'] = $this->mCliente->paginate(10);

        $data['pager']  = $this->mCliente->pager;

        $data['title'] = 'Alunos';
        //
        return view('newSuper/pages/alunos/home', $data);
    }
    public function clientes()
    {
        $mClients = new ClientModel();

        $data['title'] = 'Clientes';
        //
        $data['clients'] = $mClients->findAll();

        return view('super/pages/clientes', $data);
    }
    public function sair()
    {
        session_destroy();
        return redirect()->to('superadmin/logout');
    }
}
