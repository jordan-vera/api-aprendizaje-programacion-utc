<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteRespuestaPuzzleModel;

class Estudianterespuestapuzzle extends BaseController
{

    public function getporpuzzle($idpuzzle)
    {
        $model = new EstudianteRespuestaPuzzleModel();
        $data = $model->asArray()->where(['idpuzzle' => $idpuzzle])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getporestudiante($idestudiante)
    {
        $model = new EstudianteRespuestaPuzzleModel();
        $data = $model->asArray()
        ->join('puzzle', 'puzzle.idpuzzle = estudianterespuestapuzzle.idpuzzle')
        ->where(['idestudiante' => $idestudiante])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new EstudianteRespuestaPuzzleModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }
}
