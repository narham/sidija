<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

// use App\Models\UsersModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Mengisi Database 
        $data = [
            [
                'nama'          =>  'Agung Raharjo',
                'username'       =>  'admin',
                'password' =>  password_hash('1234567890', PASSWORD_BCRYPT),
                'is_active' =>  1,
                'status'        =>  0,
                'foto'         =>  'foto.jpg',
                // 'created_at' => Time::now()
            ],
            [
                'nama'          =>  'Agung Raharjo',
                'username'       =>  'petugas',
                'password' =>  password_hash('1234567890', PASSWORD_BCRYPT),
                'is_active' =>  1,
                'status'        =>  1,
                'foto'         =>  'foto.jpg',
                // 'created_at' => Time::now()
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}