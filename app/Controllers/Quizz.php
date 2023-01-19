<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstudianteQuizzModel;
use App\Models\QuizzModel;
use App\Models\RespuestaQuizzModel;

class Quizz extends BaseController
{
    public function getall($idclase)
    {
        $model = new QuizzModel();
        $data = $model->asArray()
            ->where(['idclase' => $idclase])->findAll();
        return $this->getResponse(['response' => $data]);
    }

    public function getallrespuestas($idclase)
    {
        $array = array();
        $arrayGeneralNorespondidas = array();
        $arrayGeneralRespondidas = array();

        $model = new QuizzModel();
        $data = $model->asArray()
            ->where(['idclase' => $idclase])->findAll();

        for ($i =0; $i < count($data); $i++) {
            $modelRespuestaQuizz = new RespuestaQuizzModel();
            $dataRespuestaQuizz = $modelRespuestaQuizz->asArray()
            ->where(['idquizz' => $data[$i]['idquizz']])
            ->findAll();

            for ($j = 0; $j < count($dataRespuestaQuizz); $j++) {
                array_push($array, $dataRespuestaQuizz[$j]);
            }

            //verificar si ya esta resuelto el quizz
            $datarelacion = new EstudianteQuizzModel();
            $dataestudiantequizz = $datarelacion->asArray()->where(['idquizz' => $data[$i]['idquizz']])->first();
            if ($dataestudiantequizz != null) {
                // si esta resuelto
                if ($dataestudiantequizz['idquizz'] == $data[$i]['idquizz']) {
                    // verificar si el programa esta resuelto de la forma correcta
                    $modelEstudianteQuizzR = new EstudianteQuizzModel();
                    $dataEstudianteQuizzR = $modelEstudianteQuizzR->asArray()
                    ->join('estudiante_respuestaquizz', 'estudiante_respuestaquizz.idestudiante_quizz = estudiante_quizz.idestudiante_quizz')
                        ->where(['estudiante_quizz.idquizz' => $data[$i]['idquizz']])->first();
                    
                        $datarespuestaComparacion = $modelRespuestaQuizz->asArray()
                        ->where(['idrespuestaquizz' => $dataEstudianteQuizzR['idrespuestaquizz']])
                        ->first();

                    if($datarespuestaComparacion['escorrecta'] == 1 || $datarespuestaComparacion['escorrecta'] == true) {
                        array_push($arrayGeneralRespondidas, ["idquizz" => $data[$i]['idquizz'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => true, "escorrecta" => true]);
                    } else {
                        array_push($arrayGeneralRespondidas, ["idquizz" => $data[$i]['idquizz'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => true, "escorrecta" => false]);
                    }
                }
            } else {
                array_push($arrayGeneralNorespondidas, ["idquizz" => $data[$i]['idquizz'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => false]);
            }
        }
        return $this->getResponse(['response' => $data, 'respuestaquizz' => $array, 'norespondidas' => $arrayGeneralNorespondidas, 'respondidas' => $arrayGeneralRespondidas]);
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

    public function update()
    {
        $datosInput = $this->getRequestInput($this->request);
        $model = new QuizzModel();
        $idquizz = $datosInput['idquizz'];

        $data = [
            'titulo' => $datosInput['titulo'],
        ];
        $model->update($idquizz, $data);

        return $this->getResponse(['response' => 'quizz actualizada correctamente']);
    }
}
