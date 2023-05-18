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
    

    public function authclient($input)
    {

        //verifica se email do usuarios existe
        $builder = $this->where('email', $input['email'])->findAll();

        //pelo menos 1 resultado
        if (count($builder) == 1) {
            //vefica se a senha é compativel com a senha digitada
            if (password_verify($input['password'], $builder[0]['password'])) {

                //variavel de sessão
                $session = session();

                //dados para gravar na sessão
                $data = [
                    'idUser'       => intval($builder[0]['id']),
                    'name'         => $builder[0]['name'],
                    'username'     => $builder[0]['username'],
                    'email'        => $builder[0]['email'],
                    'loggedClient' => true
                ];

                //grava o acesso
                $mLogs = new LogsAcessosModel();
                $mLogs->save([
                    'id_cliente' => intval($builder[0]['id'])
                ]);
            
                //salva dos dados na sessão
                $session->set($data);
                
            } else {
                //erro de senha
                $session = session();
                $session->setFlashdata('error', lang('Alertas.senhaErrada'));
                throw new Exception(lang('Alertas.senhaErrada'));
            }
        } else {
            //erro de email
            $session = session();
            $session->setFlashdata('error', lang('Alertas.emailErrado'));
            throw new Exception(lang('Alertas.emailErrado'));
        }
    }
}
