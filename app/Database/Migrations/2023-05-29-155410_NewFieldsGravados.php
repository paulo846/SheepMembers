<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewFieldsGravados extends Migration
{
    public function up()
    {
        //
        $db = db_connect();

        $db->disableForeignKeyChecks();

        $this->forge->addColumn(
            'gravados',
            [
                'slug' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'hero' => [
                    'type' => 'text',
                    'null' => true
                ],
                'ordem' => [
                    'type' => 'int',
                    'null' => true,
                    'constraint' => 3
                ],
                'comentarios' => [
                    'type' => 'varchar',
                    'null' => true,
                    'constraint' => 3
                ]
            ]
        );

        $db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
        $this->forge->dropColumn('gravados', ['hero', 'ordem', 'comentarios', 'slug']);
    }
}
