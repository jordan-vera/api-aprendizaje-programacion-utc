<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CodigoModel;
use App\Models\EstudianteProgramasModel;
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
        $arrayGeneralNorespondidas = array();
        $arrayGeneralRespondidas = array();

        $model = new ProgramasModel();
        $data = $model->asArray()->where(['idclase' => $idclase])->findAll();

        for ($i = 0; $i < count($data); $i++) {
            $modelcodigo = new CodigoModel();
            $datacodigo = $modelcodigo->asArray()
                ->where(['idprograma' => $data[$i]['idprograma']])
                ->findAll();
            for ($j = 0; $j < count($datacodigo); $j++) {
                array_push($array, $datacodigo[$j]);
            }

            //verificar si ya esta resuelto el programa
            $datarelacion = new EstudianteProgramasModel();
            $dataestudianteprograma = $datarelacion->asArray()->where(['idprograma' => $data[$i]['idprograma']])->first();
            if ($dataestudianteprograma != null) {
                if ($dataestudianteprograma['idprograma'] == $data[$i]['idprograma']) {
                    // verificar si el programa esta resuelto de la forma correcta

                    $modelEstudianteProgramaR = new EstudianteProgramasModel();
                    $dataEstudianteProgramaR = $modelEstudianteProgramaR->asArray()
                        ->join('respuesta_codigo', 'respuesta_codigo.idestudiante_programas = estudiantes_programas.idestudiante_programas')
                        ->where(['estudiantes_programas.idprograma' => $data[$i]['idprograma']])->first();

                    $datacodigoComparacion = $modelcodigo->asArray()
                        ->where(['idcodigo' => $dataEstudianteProgramaR['idcodigo']])
                        ->first();

                    if ($datacodigoComparacion['respuestacorrecta'] == 1 || $datacodigoComparacion['respuestacorrecta'] == true) {
                        array_push($arrayGeneralRespondidas, ["idprograma" => $data[$i]['idprograma'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => true, "escorrecta" => true]);
                    } else {
                        array_push($arrayGeneralRespondidas, ["idprograma" => $data[$i]['idprograma'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => true, "escorrecta" => false]);
                    }
                }
            } else {
                array_push($arrayGeneralNorespondidas, ["idprograma" => $data[$i]['idprograma'], "titulo" => $data[$i]['titulo'], "idclase" => $data[$i]['idclase'], "created_at" => $data[$i]['created_at'], "respondido" => false]);
            }
        }
        return $this->getResponse(['response' => $data, 'codigo' => $array, 'norespondidas' => $arrayGeneralNorespondidas, 'respondidas' => $arrayGeneralRespondidas]);
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
