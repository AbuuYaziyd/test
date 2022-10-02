<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sharh extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sharh_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sharh_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'author_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'sharh_cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'sharh_volume' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('sharh_id', true);
        $this->forge->createTable('sharhs');
    }

    public function down()
    {
        $this->forge->dropTable('sharhs');
    }
}
