<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudianteRespuestaPuzzleModel extends Model
{
    protected $table = 'estudianterespuestapuzzle';
    protected $primaryKey = 'idestudianterespuesta_puzzle';
    protected $allowedFields = ['imagenrespuesta', 'tiempo_usado', 'puntaje'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}