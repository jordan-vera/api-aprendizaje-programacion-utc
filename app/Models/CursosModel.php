<?php

namespace App\Models;

use CodeIgniter\Model;

class CursosModel extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'idcurso';
    protected $allowedFields = ['nombrecurso', 'iddocente', 'imagen'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}