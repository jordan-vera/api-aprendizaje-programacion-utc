<?php

namespace App\Models;

use CodeIgniter\Model;

class PreguntaQuizzModel extends Model
{
    protected $table = 'preguntaquizz';
    protected $primaryKey = 'idpreguntaquizz';
    protected $allowedFields = ['pregunta', 'idquizz'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}