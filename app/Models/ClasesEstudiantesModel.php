<?php

namespace App\Models;

use CodeIgniter\Model;

class ClasesEstudiantesModel extends Model
{
    protected $table = 'clases_estudiantes';
    protected $primaryKey = 'idclaseestudiante';
    protected $allowedFields = ['idclase', 'idestudiante'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}