<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClienteAdmin extends Migration
{
    public function up()
    {
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
            'username' => [
                'type' => 'varchar',
                'constraint' => 55,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'phone' => [
                'type' => 'varchar',
                'constraint' => 30
            ],
            'image' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'token' => [
                'type' => 'varchar',
                'constraint' => 255
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
        $this->forge->createTable('empresa_cliente', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('empresa_cliente', true);
    }
}
