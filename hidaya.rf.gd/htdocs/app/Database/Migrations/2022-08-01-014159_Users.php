<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'unique' => true,
            ],
            'malaf' => [
                'type'       => 'INTEGER',
                'constraint' => 255,
                'null' => true,
                'unique' => true,
            ],
            'iqama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'unique' => true,
            ],
            'passport' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bitaqa' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default' => 'user',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nationality' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'jamia' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default' => 0,
                'comment' => 'active=1, inactive=0'
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'bank' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'iban' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
