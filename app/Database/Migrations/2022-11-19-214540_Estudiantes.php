<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estudiantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idestudiante' => [
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
        $this->forge->addPrimaryKey('idestudiante');
        $this->forge->createTable('estudiantes');
       // $this->forge->addForeignKey('idusuario_id', 'usuario_login', 'idusuario');
    }

    public function down()
    {
        $this->forge->dropTable('estudiantes');
    }
}
