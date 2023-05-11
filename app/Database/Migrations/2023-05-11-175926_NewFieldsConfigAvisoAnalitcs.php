<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewFieldsConfigAvisoAnalitcs extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('empresa_config', [
            'analytics' => [
                'type' => 'text',
                'null' => true
            ],
            'alertas' => [
                'type' => 'text',
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa_config', ['analytics','alertas']);
    }
}
