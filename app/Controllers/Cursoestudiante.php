<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursoEstudianteModel;

class Cursoestudiante extends BaseController
{
    public function getone($idestudiante, $idcurso)
    {
        $model = new CursoEstudianteModel();
        $data = $model->asArray()
            ->where(['idestudiante' => $idestudiante])
            ->where(['idcurso' => $idcurso])
            ->first();
        return $this->getResponse(['response' => $data]);
    }

    public function getestudiantesporcurso($idcurso)
    {
        $model = new CursoEstudianteModel();
        $data = $model->asArray()
            ->where(['idcurso' => $idcurso])
            ->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new CursoEstudianteModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

    public function updateestado()
    {
        $model = new CursoEstudianteModel();
        $datosInput = $this->getRequestInput($this->request);
        $idcurso_estudiante = $datosInput['idcurso_estudiante'];

        $data = [
            'estado_aceptado' => $datosInput['estado_aceptado'],
        ];
        $model->update($idcurso_estudiante, $data);

        return $this->getResponse(['response' => 'respuestas actualizada correctamente']);
    }
}
