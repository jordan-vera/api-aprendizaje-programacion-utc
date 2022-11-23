<?php

namespace App\Models;

use CodeIgniter\Model;

class CodigoModel extends Model
{
    protected $table = 'codigo';
    protected $primaryKey = 'idcodigo';
    protected $allowedFields = ['fragmentocodigo', 'respuestacorrecta', 'idprograma'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}