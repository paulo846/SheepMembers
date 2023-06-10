<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewFieldOrderCarrosseis extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('carrosseis', [
            'ordem' => [
                'type' => 'int',
                'constraint' => '2'
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa_config', ['order']);
    }
}
