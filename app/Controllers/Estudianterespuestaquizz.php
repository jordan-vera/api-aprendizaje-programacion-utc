<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteRespuestaSeleccionQuizzModel;

class Estudianterespuestaquizz extends BaseController
{

    public function getporrespuesta($idrespuestaquizz)
    {
        $model = new EstudianteRespuestaSeleccionQuizzModel();
        $data = $model->asArray()->where(['idrespuestaquizz' => $idrespuestaquizz])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getporestudiantequizz($idestudiante_quizz)
    {
        $model = new EstudianteRespuestaSeleccionQuizzModel();
        $data = $model->asArray()->where(['idestudiante_quizz' => $idestudiante_quizz])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new EstudianteRespuestaSeleccionQuizzModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }
}
