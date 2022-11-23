<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudiantepreguntaquizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idestudiante_preguntaquizz' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idestudiante_quizz' => [
                'type'          => 'INT'
            ],
            'idpreguntaquizz' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idestudiante_preguntaquizz');
        $this->forge->createTable('estudiante_preguntaquizz');
    }

    public function down()
    {
        $this->forge->dropTable('estudiante_preguntaquizz');
    }
}
