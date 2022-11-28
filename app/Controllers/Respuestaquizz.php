<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RespuestaQuizzModel;

class Respuestaquizz extends BaseController
{
    public function getall($idquizz)
    {
        $model = new RespuestaQuizzModel();
        $data = $model->asArray()
            ->where(['idquizz' => $idquizz])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idrespuestaquizz)
    {
        $model = new RespuestaQuizzModel();
        $data = $model->asArray()->where(['idrespuesta' => $idrespuestaquizz])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new RespuestaQuizzModel();
        $model->save($datosInput);
        $id = $model->getInsertID();

        return $this->getResponse(['response' => $id]);
    }

    public function delete($idrespuestaquizz)
    {
        $model = new RespuestaQuizzModel();
        if ($model->delete($idrespuestaquizz)) {
            return $this->getResponse(['response' => 'Registro eliminado correctamente']);
        }
    }

    public function deleteall($idquizz)
    {
        $model = new RespuestaQuizzModel();
        if ($model->where('idquizz', $idquizz)->delete()) {
            return $this->getResponse(['response' => 'preguntas eliminadas correctamente']);
        }
    }
}
