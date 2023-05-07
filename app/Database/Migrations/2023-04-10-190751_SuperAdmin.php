<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuperAdmin extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'token' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('super_admins', true);

        $seeder = \Config\Database::seeder();
        $seeder->call('UsuariosSeeder');

    }

    public function down()
    {
        //
        $this->forge->dropTable('super_admins', true);
    }
}
