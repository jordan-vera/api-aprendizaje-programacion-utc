<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CodigoModel;

class Codigo extends BaseController
{
    public function getall($idprograma)
    {
        $model = new CodigoModel();
        $data = $model->asArray()
            ->where(['idprograma' => $idprograma])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idcodigo)
    {
        $model = new CodigoModel();
        $data = $model->asArray()->where(['idcodigo' => $idcodigo])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new CodigoModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

    public function delete($idprograma)
    {
        $model = new CodigoModel();
        if ($model->where('idprograma', $idprograma)->delete()) {
            return $this->getResponse(['response' => 'Codigos eliminados correctamente']);
        }
    }
}
