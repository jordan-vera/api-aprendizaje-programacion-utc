<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CodigoModel;
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

    public function getallprogramacodigo($idclase)
    {
        $array = array();

        $model = new ProgramasModel();
        $data = $model->asArray()
            ->where(['idclase' => $idclase])->findAll();

        for ($i = 0; $i < count($data); $i++) {

            $modelcodigo = new CodigoModel();
            $datacodigo = $modelcodigo->asArray()
                ->where(['idprograma' => $data[$i]['idprograma']])
                ->findAll();

            for ($j = 0; $j < count($datacodigo); $j++) {
                array_push($array, $datacodigo[$j]);
            }
        }
        return $this->getResponse(['response' => $data, 'codigo' => $array]);
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

    public function delete($idprograma)
    {
        $model = new ProgramasModel();
        if ($model->delete($idprograma)) {
            return $this->getResponse(['response' => 'Codigo eliminada correctamente']);
        }
    }
}
