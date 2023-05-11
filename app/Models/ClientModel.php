<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresa_cliente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'token', 'username', 'phone', 'image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function authclient($input)
    {

        $session = session();
        session()->regenerate();

        $builder = $this->where('email', $input['email'])->findAll();

        if (count($builder)) {
            if (password_verify($input['password'], $builder[0]['password'])) {
                $session = session();
                $data = [
                    'idUser'       => intval($builder[0]['id']),
                    'name'         => $builder[0]['name'],
                    'username'     => $builder[0]['username'],
                    'email'        => $builder[0]['email'],
                    'loggedClient' => true
                ];
                
                //$mLogs = new LogsAcessosModel();
                //$mLogs->createLogUser(['0', intval($builder[0]['id'])]);
                
                $session->set($data);

            } else {
                $session->setFlashdata('error', lang('Alertas.senhaErrada'));
                throw new Exception(lang('Alertas.senhaErrada'));
            }
        } else {
            $session->setFlashdata('error', lang('Alertas.emailErrado'));
            throw new Exception(lang('Alertas.emailErrado'));
        }
    }
}
