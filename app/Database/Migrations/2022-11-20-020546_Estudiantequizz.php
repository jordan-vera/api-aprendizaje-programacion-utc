<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudiantequizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idestudiante_quizz' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idclase_estudiantes' => [
                'type'          => 'INT'
            ],
            'idquizz' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idestudiante_quizz');
        $this->forge->createTable('estudiante_quizz');
    }

    public function down()
    {
        $this->forge->dropTable('estudiante_quizz');
    }
}
