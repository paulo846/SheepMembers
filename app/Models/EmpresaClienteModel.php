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
}
