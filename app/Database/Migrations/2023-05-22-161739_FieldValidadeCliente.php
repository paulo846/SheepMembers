<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FieldValidadeCliente extends Migration
{
    public function up()
    {
        //NOVOS CAMPOS EM CLIENTES
        //CLIENTE ATIVO OU  INATIVO
        //PRAZO PARA BLOQUEIO DA PLATAFORMA EM DIAS
        $this->forge->addColumn('empresa', [
            'bloqueio' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'DEFAULT' => false,
                'AFTER' => 'id'
            ],
            'prazo' => [
                'type' => 'int',
                'constraint' => 3,
                'AFTER' => 'bloqueio',
                'DEFAULT' => 30
            ]
        ]);

    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa', ['bloqueio', 'prazo']);
    }
}
