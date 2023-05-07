<?php

namespace App\Database\Seeds;

use App\Models\SuperadminModel;
use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        //
        $model = new SuperadminModel();

        $data = [
            'name' => "Paulo",
            'email' => "igrsysten@gmail.com",
            'password' => password_hash('mudar@123', PASSWORD_BCRYPT),
            'token' => bin2hex(random_bytes(16))
        ];

        $model->save($data);
    }
}
