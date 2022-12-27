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

    public function update()
    {
        $datosInput = $this->getRequestInput($this->request);
        $model = new EstudiantesModel();
        $idestudiante = $datosInput['idestudiante'];

        $data = [
            'nombres' => $datosInput['nombres'],
            'identificacion' => $datosInput['identificacion'],
            'email' => $datosInput['email'],
        ];
        $model->update($idestudiante, $data);

        return $this->getResponse(['response' => 'estudiante actualizado correctamente']);
    }
}