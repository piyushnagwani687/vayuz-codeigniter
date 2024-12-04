<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserEducationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'degree' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'institute' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_education');
    }

    public function down()
    {
        $this->forge->dropTable('user_education');
    }
}
