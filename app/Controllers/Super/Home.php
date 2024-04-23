<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;
use App\Models\LogsAcessosModel;

class Home extends BaseController
{
    private $mEmpresa;
    private $mCliente;
    private $mEmpresaCliente;
    private $mLogsAcessos;

    public function __construct()
    {
        $this->mEmpresa        = new EmpresaModel();
        $this->mCliente        = new ClientModel();
        $this->mEmpresaCliente = new EmpresaClienteModel();
        $this->mLogsAcessos    = new LogsAcessosModel();
    }
    public function index()
    {
        $data['clientes']    = $this->mEmpresa;
        $data['assinaturas'] = $this->mEmpresaCliente;
        
        $data['title'] = 'Dashboard';
        //
        return view('newSuper/pages/dashboard/home', $data);
    }





    
    public function alunos()
    {

        
        //dados da empresa
        //$data['mEmpresa'] = $this->mEmpresa;
        $data['totalAlunos'] = $this->mCliente->countAllResults();

        if ($this->request->getGet('b') !== null) {
            $this->mCliente->where('bloqueio', $this->request->getGet('b'));
        }
        //define busca por nome, email e id também lista do mais antigo para o mais atual
        if ($search = $this->request->getGet('s')) {
            $this->mCliente->groupStart()
                ->like('name', esc($search))
                ->orLike('email', esc($search))
                ->orLike('phone', esc($search))
                ->orLike('id', esc($search))
                ->groupEnd()
                ->orderBy('id', 'ASC');
        } else {
            //lista do mais atual para o mais antingo
            $this->mCliente->orderBy('created_at', 'DESC');
        }

        //define quantidade de cadastros retornados na mesma página, limite 150
        if ($this->request->getGet('limit')) {
            if ($this->request->getGet('limit') <= 150) {
                $numBusca = intval($this->request->getGet('limit'));
            } else {
                $numBusca = intval(150);
            }
        } else {
            $numBusca = intval(10);
        }
        //por data
        $dataInicial = $this->request->getGet('datein');
        $dataFinal = $this->request->getGet('dateout');
        if ($dataInicial && $dataFinal) {
            $this->mCliente->where('created_at >=', $dataInicial . ' 00:00:00')
                ->where('created_at <=', $dataFinal . ' 23:59:59');
        }
        $data['cliente'] = $this->mCliente->paginate($numBusca);
        $data['pager']  = $this->mCliente->pager;
        $data['title'] = 'Alunos';
        $empresas = $this->mEmpresa->findAll();
        $eventoName = [];
        foreach ($empresas as $empresa) {
            $eventoName[$empresa['id']] = $empresa['evento'];
        }
        $data['eventos'] = $eventoName;
        $data['acessos'] = $this->mLogsAcessos;
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
