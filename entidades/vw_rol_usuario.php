<?php

class Vw_rol_usuario{
    private $id_rol_opciones;
    private $tbl_rol_id_rol;
    private $rol_descripcion;
    private $tbl_usuario_id_usuario;
    private $usuario;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}