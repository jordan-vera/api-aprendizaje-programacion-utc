<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantePreguntaQuizzModel extends Model
{
    protected $table = 'estudiante_preguntaquizz';
    protected $primaryKey = 'idestudiante_preguntaquizz';
    protected $allowedFields = ['idestudiante_quizz', 'idpreguntaquizz'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}