<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudiantesprogramas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idestudiante_programas' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idprograma' => [
                'type'    => 'INT'
            ],
            'idclaseestudiante' => [
                'type'    => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idestudiante_programas');
        $this->forge->createTable('estudiantes_programas');
    }

    public function down()
    {
        $this->forge->dropTable('estudiantes_programas');
    }
}
