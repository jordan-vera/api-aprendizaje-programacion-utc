<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Programas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idprograma' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'idclase' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idprograma');
        $this->forge->createTable('programas');
    }

    public function down()
    {
        $this->forge->dropTable('programas');
    }
}
