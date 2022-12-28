<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteProgramasModel;

class Estudiantesprogramas extends BaseController
{

    public function getporprograma($idprograma)
    {
        $model = new EstudianteProgramasModel();
        $data = $model->asArray()->where(['idprograma' => $idprograma])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new EstudianteProgramasModel();
        $model->save($datosInput);
        $id = $model->getInsertID();

        return $this->getResponse(['response' => $id]);
    }
}
