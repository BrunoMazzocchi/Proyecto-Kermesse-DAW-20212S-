<?php

class Rol_usuario{

    private $id_rol_usuario;
    private $tbl_usuario_id_usuario;
    private $tbl_rol_id_rol;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}