<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrosselModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carrosseis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_empresa',
        'title',
        'config',
        'ordem'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
