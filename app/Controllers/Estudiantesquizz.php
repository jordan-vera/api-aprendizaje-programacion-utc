<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteQuizzModel;

class Estudiantesquizz extends BaseController
{

    public function getporquizz($idquizz)
    {
        $model = new EstudianteQuizzModel();
        $data = $model->asArray()->where(['idquizz' => $idquizz])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getporestudiante($idestudiante)
    {
        $model = new EstudianteQuizzModel();
        $data = $model->asArray()->where(['idestudiante' => $idestudiante])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new EstudianteQuizzModel();
        $model->save($datosInput);
        $id = $model->getInsertID();

        return $this->getResponse(['response' => $id]);
    }
}
