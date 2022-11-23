<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Respuestacodigo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idrespuestacodigo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idcodigo' => [
                'type'    => 'INT'
            ],
            'idestudiante_programas' => [
                'type'    => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idrespuestacodigo');
        $this->forge->createTable('respuesta_codigo');
    }

    public function down()
    {
        $this->forge->dropTable('respuesta_codigo');
    }
}
