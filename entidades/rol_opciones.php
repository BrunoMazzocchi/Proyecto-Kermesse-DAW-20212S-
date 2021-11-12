<?php

class Rol_opciones{
    private $id_rol_opciones;
    private $tbl_rol_id_rol;
    private $tbl_opciones_id_opciones;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}