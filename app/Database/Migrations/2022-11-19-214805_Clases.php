<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clases extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idclase' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombreclase' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'idcurso' => [
                'type'          => 'INT'
            ],
            'esactiva' => [
                'type'          => 'BOOLEAN'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idclase');
        $this->forge->createTable('clases');
    }

    public function down()
    {
        $this->forge->dropTable('clases');
    }
}
