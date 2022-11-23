<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Codigo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idcodigo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fragmentocodigo' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'respuestacorrecta' => [
                'type' => 'BOOLEAN',
                'null' => false,
            ],
            'idprograma' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idcodigo');
        $this->forge->createTable('codigo');
    }

    public function down()
    {
        //
    }
}
