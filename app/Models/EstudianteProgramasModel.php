<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudianteProgramasModel extends Model
{
    protected $table = 'estudiantes_programas';
    protected $primaryKey = 'idestudiante_programas';
    protected $allowedFields = ['idprograma'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}