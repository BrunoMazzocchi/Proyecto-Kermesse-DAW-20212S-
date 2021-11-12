<?php

class Rol{

    private $id_rol;
    private $rol_descripcion;
    private $estado;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}