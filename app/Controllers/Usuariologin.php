<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariologinModel;

class Usuariologin extends BaseController
{

    public function login($nick, $clave)
    {
        $model = new UsuariologinModel();
        $data = $model->asArray()
            ->where(['nick' => $nick])
            ->where(['clave' => md5($clave)])
            ->first();
        if ($data == null) {
            return $this->getResponse(['error' => 'Credenciales incorrectas']);
        } else {
            return $this->getResponse(['response' => $data]);
        }
    }

    public function verificarclavecorrecta($idusuario, $clave)
    {
        $model = new UsuariologinModel();
        $data = $model->asArray()
            ->where(['idusuario' => $idusuario])
            ->where(['clave' => md5($clave)])
            ->first();
        if ($data == null) {
            return $this->getResponse(['error' => 'Clave incorrecta']);
        } else {
            return $this->getResponse(['response' => 'Clave correcta']);
        }
    }

    public function updateclave()
    {
        $datosInput = $this->getRequestInput($this->request);
        $model = new UsuariologinModel();
        $idusuario = $datosInput['idusuario'];

        $data = [
            'clave' => md5($datosInput['clave']),
        ];
        $model->update($idusuario, $data);

        return $this->getResponse(['response' => 'clave actualizada correctamente']);
    }

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new UsuariologinModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }
}
