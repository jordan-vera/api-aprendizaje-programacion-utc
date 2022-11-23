<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Docentes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iddocente' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombres' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true
            ],
            'identificacion' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false
            ],
            'idusuario' => [
                'type'          => 'INT'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('iddocente');
        $this->forge->createTable('docentes');
        //$this->forge->addForeignKey('idusuario_id', 'usuario_login', 'idusuario');
    }

    public function down()
    {
        $this->forge->dropTable('docentes');
    }
}
