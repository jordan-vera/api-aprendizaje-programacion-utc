<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClasesModel;
use App\Models\CursoEstudianteModel;
use App\Models\CursosModel;

class Cursos extends BaseController
{
    public function getall($iddocente)
    {
        $model = new CursosModel();
        $data = $model->asArray()->where(['iddocente' => $iddocente])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function count($iddocente)
    {
        $model = new CursosModel();
        $data = $model->asArray()->where(['iddocente' => $iddocente])->countAllResults();
        return $this->getResponse(['response' => $data]);
    }

    public function countestudiante($idestudiante)
    {
        $model = new CursosModel();
        $data = $model->asArray()
        ->join('cursos_estudiantes', 'cursos_estudiantes.idestudiante = estudiantes.idestudiante')
        ->where(['cursos_estudiantes.idestudiante' => $idestudiante])->countAllResults();
        return $this->getResponse(['response' => $data]);
    }

    public function getsearch($nombre)
    {
        $model = new CursosModel();
        $data = $model->asArray()->like(['nombrecurso' => $nombre])->findAll();
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

    public function delete($idcurso)
    {
        $model = new CursosModel();

        if ($model->where('idcurso', $idcurso)->delete()) {

            $modelclase = new ClasesModel();
            if ($modelclase->where('idcurso', $idcurso)->delete()) {

                $modelcursoestudiante = new CursoEstudianteModel();
                if ($modelcursoestudiante->where('idcurso')->delete()) {
                    return $this->getResponse(['response' => 'Curso eliminados correctamente']);
                }
            }
        }
    }
}
