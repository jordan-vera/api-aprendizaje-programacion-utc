<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idquizz' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'idclase' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idquizz');
        $this->forge->createTable('quizz');
    }

    public function down()
    {
        $this->forge->dropTable('quizz');
    }
}
