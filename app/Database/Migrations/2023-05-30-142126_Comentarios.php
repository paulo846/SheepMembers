<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comentarios extends Migration
{
    public function up()
    {
        $db = db_connect();

        $db->disableForeignKeyChecks();

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
            'id_gravacao' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'aprovado' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'DEFAULT' => true,
                'AFTER' => 'id'
            ],
            'comentario' => [
                'type' => 'text'
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
        $this->forge->addForeignKey('id_empresa',  'empresa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gravacao', 'gravados', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_usuario',  'empresa_cliente', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comentarios', true);

        $db->enableForeignKeyChecks();

    }

    public function down()
    {
        

        //
        $this->forge->dropTable('comentarios');

    }
}
