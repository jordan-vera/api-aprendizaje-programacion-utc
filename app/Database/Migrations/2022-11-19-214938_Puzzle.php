<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Puzzle extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpuzzle' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'tiempo_estimado' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'idclase' => [
                'type'  => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idpuzzle');
        $this->forge->createTable('puzzle');
    }

    public function down()
    {
        $this->forge->dropTable('puzzle');
    }
}
