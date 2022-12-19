<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClasesModel;
use App\Models\CursosModel;

class Clases extends BaseController
{
    public function getall($idcurso)
    {
        $model = new ClasesModel();
        $data = $model->asArray()
        ->join('cursos', 'cursos.idcurso = clases.idcurso')
        ->where(['cursos.idcurso' => $idcurso])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idclase)
    {
        $model = new ClasesModel();
        $data = $model->asArray()->where(['idclase' => $idclase])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new ClasesModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

    public function delete($idclase)
    {
        $model = new ClasesModel();
        if ($model->where('idclase', $idclase)->delete()) {
            return $this->getResponse(['response' => 'Cursos eliminados correctamente']);
        }
    }

}