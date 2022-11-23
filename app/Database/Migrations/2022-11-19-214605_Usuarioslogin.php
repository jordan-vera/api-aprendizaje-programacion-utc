<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarioslogin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idusuario' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nick' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'unique' => true
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => '90',
                'null' => false
            ],
            'tipo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('idusuario');
        $this->forge->createTable('usuario_login');
    }

    public function down()
    {
        $this->forge->dropTable('usuario_login');
    }
}
