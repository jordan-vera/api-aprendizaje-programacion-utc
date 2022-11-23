<?php

namespace App\Models;

use CodeIgniter\Model;

class DocentesModel extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'iddocente';
    protected $allowedFields = ['nombres', 'identificacion', 'email', 'idusuario'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}