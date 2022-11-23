<?php

namespace App\Models;

use CodeIgniter\Model;

class CursoEstudianteModel extends Model
{
    protected $table = 'cursos_estudiantes';
    protected $primaryKey = 'idcurso_estudiante';
    protected $allowedFields = ['idcurso', 'idestudiante', 'estado_aceptado'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}