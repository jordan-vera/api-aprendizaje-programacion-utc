<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantesModel extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'idestudiante';
    protected $allowedFields = ['nombres', 'identificacion', 'email', 'idusuario'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}