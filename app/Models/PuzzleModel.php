<?php

namespace App\Models;

use CodeIgniter\Model;

class PuzzleModel extends Model
{
    protected $table = 'puzzle';
    protected $primaryKey = 'idpuzzle';
    protected $allowedFields = ['titulo', 'imagen', 'tiempo_estimado', 'idclase'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}