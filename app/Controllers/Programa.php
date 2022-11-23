<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramasModel;

class Programa extends BaseController
{
    public function getall($idclase)
    {
        $model = new ProgramasModel();
        $data = $model->asArray()
            ->where(['idclase' => $idclase])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idprograma)
    {
        $model = new ProgramasModel();
        $data = $model->asArray()->where(['idprograma' => $idprograma])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new ProgramasModel();
        $model->save($datosInput);
        $id = $model->getInsertID();

        return $this->getResponse(['response' => $id]);
    }
}
