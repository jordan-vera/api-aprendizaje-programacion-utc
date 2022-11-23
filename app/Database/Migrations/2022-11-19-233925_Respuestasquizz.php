<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Respuestasquizz extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idrespuesta' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'respuesta' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'escorrecta' => [
                'type' => 'BOOLEAN',
                'null' => false,
            ],
            'idpregunta' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idrespuesta');
        $this->forge->createTable('respuestaquizz');
    }

    public function down()
    {
        $this->forge->dropTable('respuestaquizz');
    }
}
