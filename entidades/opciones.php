<?php

class Opciones{
    private $id_opciones;
    private $opcion_descripcion;
    private $estado;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}