<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mashruu extends Migration
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
            'ism' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'sabab' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'date' => [
                'type'       => 'DATE',
                'constraint' => 255,
                'null' => true
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'miqat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'makkah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'amount' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'mushrif' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'nation' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'malaf' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'jamia' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'iban' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mashruu');
    }

    public function down()
    {
        $this->forge->dropTable('mashruu');
    }
}
