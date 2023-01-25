<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudianteQuizzModel extends Model
{
    protected $table = 'estudiante_quizz';
    protected $primaryKey = 'idestudiante_quizz';
    protected $allowedFields = ['idestudiante', 'idquizz'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}