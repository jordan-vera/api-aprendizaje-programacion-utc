<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramasModel extends Model
{
    protected $table = 'programas';
    protected $primaryKey = 'idprograma';
    protected $allowedFields = ['titulo', 'idclase'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}