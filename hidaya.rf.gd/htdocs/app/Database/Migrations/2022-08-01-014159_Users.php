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
            ],
            'malaf' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'iqama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
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
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'bank' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'iban' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
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
