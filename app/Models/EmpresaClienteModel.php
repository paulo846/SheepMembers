<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaClienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresa_relaciona_cliente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_cliente',
        'id_empresa',
        'vencimento'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function relacionaClienteCsv(array $dadosCliente, int $empresa)
    {
        //model clientes
        $mClients = new ClientModel();

        //lista todos os clientes de acordo com a lista de emails enviada
        foreach ($mClients->where('email', $dadosCliente['email'])->findAll() as $row) {

            //pesquisa possiveis relacionamentos
            $builder = $this->where(
                [
                    'id_cliente' => intval($row['id']),
                    'id_empresa' => $empresa
                ]
            )->findAll();

            //se encontra relacionamento exclui e cadastra de novo
            if (count($builder)) {
                //exclui
                $this->delete($builder[0]['id']);

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => intval($row['id']),
                    'id_empresa' => $empresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];

                //cadastra novo relacionamento
                $this->save($relaciona);
            } else {

                //dados para relacionamento
                $relaciona = [
                    'id_cliente' => intval($row['id']),
                    'id_empresa' => $empresa,
                    'vencimento' => (isset($input['vencimento'])) ? $input['vencimento'] : 12,
                ];

                //cadastra novo relacionamento
                $this->save($relaciona);
            }
        }


        return true;
    }
}
