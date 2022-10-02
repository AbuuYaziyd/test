<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sub_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cat_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sub_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('sub_id', true);
        $this->forge->createTable('subcategories');
    }

    public function down()
    {
        $this->forge->dropTable('subcategories');
    }
}
