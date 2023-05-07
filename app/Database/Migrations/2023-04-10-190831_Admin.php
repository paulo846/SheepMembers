<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        //
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'empresa' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'valor' => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
            'contrato' => [
                'type' => 'text',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('empresa', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('empresa', true);
    }
}
