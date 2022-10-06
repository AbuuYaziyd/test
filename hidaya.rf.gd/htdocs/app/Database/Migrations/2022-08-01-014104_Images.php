<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Images extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'imgId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'userId' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'imgIqama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'imgPass' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'imgStu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'imgIban' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('imgId', true);
        $this->forge->createTable('images');
    }

    public function down()
    {
        $this->forge->dropTable('images');
    }
}
