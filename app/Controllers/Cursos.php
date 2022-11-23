<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;

class Cursos extends BaseController
{
    public function getall($iddocente)
    {
        $model = new CursosModel();
        $data = $model->asArray()->where(['iddocente' => $iddocente])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idcurso)
    {
        $model = new CursosModel();
        $data = $model->asArray()->where(['idcurso' => $idcurso])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $imagen = urldecode($datosInput['imagen']);
        $file = base64_decode($datosInput['file']);

        $filePath = "C:\\xampp\\htdocs\\archivosAprendizajeUtc\\" . $imagen;
        file_put_contents($filePath, $file);

        $model = new CursosModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

}