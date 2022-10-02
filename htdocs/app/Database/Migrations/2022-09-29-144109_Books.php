<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'book_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'book_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_volume' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'cat_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sub_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'book_price' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'book_info' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'book_picture' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'muhaqqiq' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'link_archive' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'link_waqefeya' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('book_id', true);
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
