<?php

class Rol{
    //Atributos
    private $rol_id;
    private $rol_descripcion;
    private $rol_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
