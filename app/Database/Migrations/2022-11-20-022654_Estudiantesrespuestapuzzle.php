<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudiantesrespuestapuzzle extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idestudianterespuesta_puzzle' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'imagenrespuesta' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'tiempo_usado' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'puntaje' => [
                'type' => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idestudianterespuesta_puzzle');
        $this->forge->createTable('estudianterespuestapuzzle');
    }

    public function down()
    {
        $this->forge->dropTable('estudianterespuestapuzzle');
    }
}
