<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewFieldWhatsappConfig extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('empresa_config', [
            'whatsapp' => [
                'type' => 'varchar',
                'constraint' => '16',
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa_config', ['whatsapp']);

    }
}
