<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Preguntasquizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpreguntaquizz' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'pregunta' => [
                'type' => 'TEXT',
                'null' => false,
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
        $this->forge->addPrimaryKey('idpreguntaquizz');
        $this->forge->createTable('preguntaquizz');
    }

    public function down()
    {
        $this->forge->dropTable('quizz');
    }
}
