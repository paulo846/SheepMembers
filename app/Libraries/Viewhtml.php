<?php

namespace App\Libraries;

use App\Models\ClientModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;

class Viewhtml
{
    private $mCliente;
    private $mRelaciona;
    private $mAluno;

    public function __construct()
    {
        $this->mCliente   = new EmpresaModel();
        $this->mRelaciona = new EmpresaClienteModel();
        $this->mAluno     = new ClientModel();
    }

    public function relacionamento(array $param): string
    {
        $html = '<small>';
        if (isset($param['idAluno'])) {
            $relacionamentos = $this->mRelaciona->where('id_cliente', $param['idAluno'])->findAll();
            if (count($relacionamentos)) {
                foreach ($relacionamentos as $key => $relacionamento) {
                    
                    if (isset($param['eventos'][$relacionamento['id_empresa']])) {
                        $html .= ++$key . " - {$param['eventos'][$relacionamento['id_empresa']]} <br>";
                    } else {
                        $html .= 'Evento não encontrado';
                    }
                }
            }
        } else {
            $html .= 'Sem eventos';
        }
        $html .= '</small>';
        return $html;
    }
}
