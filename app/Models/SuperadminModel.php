<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class SuperadminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'super_admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'token'];

    
    public function authsuper($input){
        
        $builder = $this->where('email', $input['email'])->findAll();
        $session = session();

        if(count($builder)){
            if(password_verify($input['password'], $builder[0]['password'])){
                $session = session();
                $data = [
                    'idUser' => $builder[0]['id'],
                    'name'  => $builder[0]['name'],
                    'email' => $builder[0]['email'],
                    'loggedSuper' => true,
                    'loggedClient' => true
                ];
                $session->set($data);
            }else{
                $session->setFlashdata('error', 'Senha incorreta!');
                throw new Exception("Senha incorreta!");
            }
        }else{
            $session->setFlashdata('error', 'Email não encontrado!');
            throw new Exception("Email não encontrado!");
        }
    }
}