<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PuzzleModel;

class Puzzle extends BaseController
{
    public function getall($idclase)
    {
        $model = new PuzzleModel();
        $data = $model->asArray()->where(['idclase' => $idclase])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getone($idpuzzle)
    {
        $model = new PuzzleModel();
        $data = $model->asArray()->where(['idpuzzle' => $idpuzzle])->first();
        return $this->getResponse(['response' => $data]);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $imagen = urldecode($datosInput['imagen']);
        $file = base64_decode($datosInput['file']);

        $filePath = "C:\\xampp\\htdocs\\archivosAprendizajeUtc\\" . $imagen;
        file_put_contents($filePath, $file);

        $model = new PuzzleModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }

    public function updateimagen()
    {
        $datosInput = $this->getRequestInput($this->request);
        $model = new PuzzleModel();
        $idpuzzle = $datosInput['idpuzzle'];

        $imagen = urldecode($datosInput['imagen']);
        $file = base64_decode($datosInput['file']);

        $filePath = "C:\\xampp\\htdocs\\archivosAprendizajeUtc\\" . $imagen;
        file_put_contents($filePath, $file);

        $data = [
            'imagen' => $datosInput['imagen'],
        ];
        $model->update($idpuzzle, $data);

        return $this->getResponse(['response' => 'quizz actualizada correctamente']);
    }

    public function update()
    {
        $datosInput = $this->getRequestInput($this->request);
        $model = new PuzzleModel();
        $idpuzzle = $datosInput['idpuzzle'];

        $data = [
            'titulo' => $datosInput['titulo'],
            'tiempo_estimado' => $datosInput['tiempo_estimado'],
        ];
        $model->update($idpuzzle, $data);

        return $this->getResponse(['response' => 'quizz actualizada correctamente']);
    }

    public function delete($idpuzzle)
    {
        $model = new PuzzleModel();
        if ($model->delete($idpuzzle)) {
            return $this->getResponse(['response' => 'Puzzle eliminado correctamente']);
        }
    }
}
