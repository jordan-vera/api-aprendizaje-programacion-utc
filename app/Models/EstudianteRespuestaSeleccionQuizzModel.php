<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantePreguntaQuizzModel extends Model
{
    protected $table = 'estudiante_respuestaquizz';
    protected $primaryKey = 'idrespuestaseleccionada_quizz';
    protected $allowedFields = ['idestudiante_quizz', 'idrespuestaquizz'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}