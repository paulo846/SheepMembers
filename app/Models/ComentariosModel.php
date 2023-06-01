<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentariosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comentarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_empresa',
        'id_gravacao',
        'id_usuario' ,
        'aprovado',
        'comentario'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
