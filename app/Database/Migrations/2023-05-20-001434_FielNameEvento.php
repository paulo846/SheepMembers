<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FielNameEvento extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('empresa', [
            'evento' => [
                'type' => 'varchar',
                'constraint' => 255
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa', ['evento']);
    }
}
