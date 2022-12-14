<?php

namespace App\Models;

use CodeIgniter\Model;

class RespuestaQuizzModel extends Model
{
    protected $table = 'respuestaquizz';
    protected $primaryKey = 'idrespuesta';
    protected $allowedFields = ['respuesta', 'escorrecta', 'idquizz'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}