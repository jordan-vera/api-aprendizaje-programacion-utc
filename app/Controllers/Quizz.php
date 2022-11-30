<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuizzModel;

class Quizz extends BaseController
{
    public function getall($idclase)
    {
        $model = new QuizzModel();
        $data = $model->asArray()
            ->where(['idclase' => $idclase])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idquizz)
    {
        $model = new QuizzModel();
        $data = $model->asArray()->where(['idquizz' => $idquizz])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new QuizzModel();
        $model->save($datosInput);
        $id = $model->getInsertID();

        return $this->getResponse(['response' => $id]);
    }

    public function delete($idquizz)
    {
        $model = new QuizzModel();
        if ($model->delete($idquizz)) {
            return $this->getResponse(['response' => 'Registro eliminado correctamente']);
        }
    }
}
