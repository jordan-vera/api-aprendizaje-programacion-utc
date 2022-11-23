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

    public function create()
    {
        $datosInput = $this->getRequestInput($this->request);

        $model = new UsuariologinModel();
        $model->save($datosInput);

        return $this->getResponse(['response' => 'Datos guardados con exito']);
    }
}
