<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudianterespuestaseleccionadaquizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idrespuestaseleccionada_quizz' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idestudiante_preguntaquizz' => [
                'type'          => 'INT'
            ],
            'idrespuestaquizz' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idrespuestaseleccionada_quizz');
        $this->forge->createTable('estudiante_respuestaquizz');
    }

    public function down()
    {
        $this->forge->dropTable('estudiante_respuestaquizz');
    }
}
