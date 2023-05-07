<?php

namespace App\Database\Seeds;

use App\Models\MessagesModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\CLI\CLI;

class TestSeeder extends Seeder
{
    public function run()
    {
        //
        $mMessage = new MessagesModel();
        $faker = \Faker\Factory::create();

        $total = 500000;

        for ($i = 0; $i < 500000; $i++) {
            $data[] = [
                'id_empresa' => 1,
                'id_user'    => 1,
                'message'    => $faker->name()
            ];
            
            CLI::showProgress($i++, $total);
        }

        $mMessage->insertBatch($data);
    }
}
