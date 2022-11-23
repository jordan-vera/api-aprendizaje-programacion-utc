<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cursoestudiante extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idcurso_estudiante' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idcurso' => [
                'type'          => 'INT'
            ],
            'idestudiante' => [
                'type'          => 'INT'
            ],
            'estado_aceptado' => [
                'type' => 'BOOLEAN',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idcurso_estudiante');
        $this->forge->createTable('cursos_estudiantes');
    }

    public function down()
    {
        $this->forge->dropTable('cursos_estudiantes');
    }
}
