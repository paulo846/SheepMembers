<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carrosseis extends Migration
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
            'id_empresa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => 60,
            ],
            'config' => [
                'type' => 'tinyint',
                'constraint' => 1
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_empresa', 'empresa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carrosseis', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('carrosseis');
    }
}
