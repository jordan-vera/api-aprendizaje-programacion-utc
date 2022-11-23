<?php

namespace App\Models;

use CodeIgniter\Model;

class ClasesModel extends Model
{
    protected $table = 'clases';
    protected $primaryKey = 'idclase';
    protected $allowedFields = ['nombreclase', 'idcurso', 'esactiva'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}