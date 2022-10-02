<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'abouyaziyd',
            'password' =>  password_hash(('1234567890'), PASSWORD_DEFAULT),
            'fname' => 'أبو يزيد عبدالرحمن الزنجباري',
            'email'    => 'abuuyaziyd@gmail.com',
            'maktaba_name' => 'مكتبة أبي يزيد',
            'dob' => '01/01/1990',
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
