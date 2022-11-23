<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizzModel extends Model
{
    protected $table = 'quizz';
    protected $primaryKey = 'idquizz';
    protected $allowedFields = ['titulo', 'idclase'];
    protected $useTimestamps = true;
    protected $updatedField = 'updated_at';
}