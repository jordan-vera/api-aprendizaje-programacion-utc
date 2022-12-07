<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudiantesModel;

class Estudiantes extends BaseController
{

    public function getone($idusuario)
    {
        $model = new EstudiantesModel();
        $data = $model->asArray()->where(['idusuario' => $idusuario])->first();
        return $this->getResponse(['response' => $data]);
    }

}