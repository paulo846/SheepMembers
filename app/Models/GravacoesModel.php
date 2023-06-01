<?php

namespace App\Models;

use CodeIgniter\Model;

class GravacoesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gravados';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_empresa',
        'id_carrossel',
        'title',
        'description',
        'url',
        'horizontal',
        'vertical',
        'hero',
        'ordem',
        'bloqueio',
        'incluidopor',
        'slug',
        'comentarios'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
