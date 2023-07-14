<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UpdatePasswordGeral extends Seeder
{
    public function run()
    {
        $newPassword = password_hash('mudar123', PASSWORD_BCRYPT);

        $users = $this->db->table('empresa_cliente')
            ->get()
            ->getResult();

        $totalUsers = count($users);
        $progress = 0;

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'password' => $newPassword
            ];

            $progress++;
            $this->showProgress($progress, $totalUsers);
        }

        $this->db->table('empresa_cliente')->updateBatch($data, 'id');

        echo "As senhas de todos os usuários foram atualizadas com sucesso.";
    }

    private function showProgress($progress, $total)
    {
        $percentage = round(($progress / $total) * 100, 2);
        $barLength = 50;
        $filledLength = round(($progress / $total) * $barLength);
        $bar = str_repeat('=', $filledLength) . str_repeat(' ', $barLength - $filledLength);

        echo "\r[{$bar}] {$percentage}%";
    }
}
