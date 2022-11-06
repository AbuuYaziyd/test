<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
        public function run()
    {
        $data = [
            ['email' => 'admin@gmail.com', 'malaf' => 0, 'iqama' => '0', 'password' => password_hash('admin', PASSWORD_DEFAULT), 'role' => 'admin', 'name' => 'مندوب', 'phone' => '0', 'bank' => '4', 'iban' => '0'],
            ['email' => 'mushrif@gmail.com', 'malaf' => 1, 'iqama' => '1020', 'password' => password_hash('mushrif', PASSWORD_DEFAULT), 'role' => 'mushrif', 'name' => 'عبد المالك محي الدين', 'phone' => '1020', 'bank' => '5', 'nationality' => 'SA', 'jamia' => '1', 'iban' => '1020'],
            ['email' => 'student@gmail.com', 'malaf' => 1025, 'iqama' => '1025', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'مد يونس مد ابراهيم', 'phone' => '1025', 'bank' => '6', 'nationality' => 'SA', 'jamia' => '1', 'iban' => '1025'],
            ['email' => '2219@gmail.com', 'malaf' => 2219, 'iqama' => '2219', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'عادل سليمان احمد ضحوي', 'phone' => '2219', 'bank' => '1', 'nationality' => 'SA', 'jamia' => '1', 'iban' => '2219'],
            ['email' => '2220@gmail.com', 'malaf' => 2220, 'iqama' => '2220', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'اديكينلي متوكل ساني', 'phone' => '2220', 'bank' => '2', 'nationality' => 'SA', 'jamia' => '1', 'iban' => '2220'],
            ['email' => '2221@gmail.com', 'malaf' => 2221, 'iqama' => '2221', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'أيوب دوكوري', 'phone' => '2221', 'bank' => '3', 'nationality' => 'SA', 'jamia' => '1', 'iban' => '2221'],
            ['email' => '2222@gmail.com', 'malaf' => 2222, 'iqama' => '2222', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'محمود لارابو سين', 'phone' => '2222', 'bank' => '3', 'nationality' => 'SA', 'jamia' => '2', 'iban' => '2222'],
            ['email' => '2223@gmail.com', 'malaf' => 2223, 'iqama' => '2223', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'محمود جالو', 'phone' => '2223', 'bank' => '3', 'nationality' => 'SA', 'jamia' => '2', 'iban' => '2223'],
            ['email' => '2224@gmail.com', 'malaf' => 2224, 'iqama' => '2224', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'محمد إبراهيم', 'phone' => '2224', 'bank' => '4', 'nationality' => 'SA', 'jamia' => '2', 'iban' => '2224'],
            ['email' => '2225@gmail.com', 'malaf' => 2225, 'iqama' => '2225', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'سلامي مسلم', 'phone' => '2225', 'bank' => '5', 'nationality' => 'SA', 'jamia' => '2', 'iban' => '2225'],
            ['email' => '2226@gmail.com', 'malaf' => 2226, 'iqama' => '2226', 'password' => password_hash(1234567890, PASSWORD_DEFAULT), 'role' => 'user', 'name' => 'مازن مظهرالدين', 'phone' => '2226', 'bank' => '6', 'nationality' => 'SA', 'jamia' => '2', 'iban' => '2226'],
        ];

        for ($i=0; $i < count($data); $i++) { 
            $this->db->table('users')->insert($data[$i]);
        }
    }

}
