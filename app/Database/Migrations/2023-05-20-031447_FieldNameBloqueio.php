<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FieldNameBloqueio extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('empresa_cliente', [
            'bloqueio' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'DEFAULT' => false,
                'AFTER' => 'id'
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa_cliente', ['bloqueio']);
    }
}
