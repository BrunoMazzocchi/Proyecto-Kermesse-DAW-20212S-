<?php

class Vw_rol_opciones{
    private $id_rol_opciones;
    private $tbl_rol_id_rol;
    private $rol_descripcion;
    private $tbl_opciones_id_opciones;
    private $opcion_descripcion;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}