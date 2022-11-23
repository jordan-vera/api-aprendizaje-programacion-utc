<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cursos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idcurso' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombrecurso' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true
            ],
            'iddocente' => [
                'type'          => 'INT'
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idcurso');
        $this->forge->createTable('cursos');
    }

    public function down()
    {
        $this->forge->dropTable('cursos');
    }
}
