<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewFieldsScriptFooterConfig extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('empresa_config', [
            'scripts_footer' => [
                'type' => 'text',
                'null' => true,
                'AFTER' => 'analytics'
            ],
            'logo' => [
                'type' => 'varchar',
                'constraint' => '60',
                'null' => true
            ],
            'capa' => [
                'type' => 'varchar',
                'constraint' => '60',
                'null' => true
            ],
            'background' => [
                'type' => 'varchar',
                'constraint' => '60',
                'null' => true
            ],
            'favicon' => [
                'type' => 'varchar',
                'constraint' => '60',
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('empresa_config', ['scripts_footer', 'logo', 'capa', 'background', 'favicon']);

    }
}
