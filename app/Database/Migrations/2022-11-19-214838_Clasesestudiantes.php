<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clasesestudiantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idclaseestudiante' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idclase' => [
                'type'          => 'INT'
            ],
            'idestudiante' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idclaseestudiante');
        $this->forge->createTable('clases_estudiantes');
    }

    public function down()
    {
        $this->forge->dropTable('clases_estudiantes');
    }
}
