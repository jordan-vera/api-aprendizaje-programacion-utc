<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariologinModel extends Model
{
    protected $table = 'usuario_login';
    protected $primaryKey = 'idusuario';
    protected $allowedFields = ['nick', 'clave', 'tipo'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}