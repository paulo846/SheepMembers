<?php

namespace App\Models;

use CodeIgniter\Model;

class LogsAcessosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'logs_acessos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_empresa',
        'id_cliente'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function createLogUser($data)
    {
        $inserir = [
            'id_empresa' => $data['id_empresa'],
            'id_cliente' => $data['id_cliente']
        ];

        $this->insert($inserir);
    }
}
