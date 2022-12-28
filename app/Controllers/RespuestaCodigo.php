<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RespuestaCodigoModel;

class RespuestaCodigo extends BaseController
{

    public function getporcodigo($idcodigo)
    {
        $model = new RespuestaCodigoModel();
        $data = $model->asArray()->where(['idcodigo' => $idcodigo])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getporrespuestacodigo($idestudiante_programas)
    {
        $model = new RespuestaCodigoModel();
        $data = $model->asArray()->where(['idestudiante_programas' => $idestudiante_programas])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new RespuestaCodigoModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }
}
