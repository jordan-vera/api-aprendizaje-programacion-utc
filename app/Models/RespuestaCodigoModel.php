<?php

namespace App\Models;

use CodeIgniter\Model;

class RespuestaCodigoModel extends Model
{
    protected $table = 'respuesta_codigo';
    protected $primaryKey = 'idrespuestacodigo';
    protected $allowedFields = ['idcodigo', 'idestudiante_programas'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}