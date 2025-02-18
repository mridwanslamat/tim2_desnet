<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new \App\Models\UserModel();
        $result = $model->findall();

        foreach ($result as $row) {
            $model->save([
                'id' => $row['id'],
                'password' => sha1(sha1(md5($row['password']))),
            ]);
        }
    }
}