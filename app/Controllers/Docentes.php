<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocentesModel;

class Docentes extends BaseController
{

    public function getone($idusuario)
    {
        $model = new DocentesModel();
        $data = $model->asArray()->where(['idusuario' => $idusuario])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function getfind($iddocente)
    {
        $model = new DocentesModel();
        $data = $model->asArray()->where(['iddocente' => $iddocente])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new DocentesModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

}