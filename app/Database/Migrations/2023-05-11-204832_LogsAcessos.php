<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogsAcessos extends Migration
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
            'id_cliente' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addForeignKey('id_cliente', 'empresa_cliente', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('logs_acessos', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('logs_acessos', true);

    }
}
