<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gravados extends Migration
{
    public function up()
    {
        //
        $db = db_connect();

        $db->disableForeignKeyChecks();
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
            'id_carrossel' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => 60,
            ],
            'description' => [
                'type' => 'text'
            ],
            'url' => [
                'type' => 'varchar',
                'constraint' => 60,
            ],
            'horizontal' => [
                'type' => 'varchar',
                'constraint' => 60,
            ],
            'vertical' => [
                'type' => 'varchar',
                'constraint' => 60,
            ],
            'bloqueio' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'DEFAULT' => false
            ],
            'incluidopor' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
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
        $this->forge->addForeignKey('id_carrossel', 'carrosseis', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gravados', true);
        
        $db->enableForeignKeyChecks();

    }

    public function down()
    {
        //
        $this->forge->dropTable('gravados');
    }
}
