<?php

class Opciones{
    //Atributos
    private $opciones_id_rol;
    private $opciones_rol_id_rol;
    private $opciones_id_opciones;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
