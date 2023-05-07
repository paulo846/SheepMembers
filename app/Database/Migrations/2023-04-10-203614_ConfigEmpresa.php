<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConfigEmpresa extends Migration
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
            'slug' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'title_pt' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'description_pt' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'stream_pt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'logo_pt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'title_en' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'description_en' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'stream_en' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'logo_en' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'title_es' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'description_es' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'stream_es' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'logo_es' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'fundo' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'link_venda' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
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
        $this->forge->createTable('empresa_config', true);
    }

    public function down()
    {
        // 
        $this->forge->dropTable('empresa_config', true);
    }
}
