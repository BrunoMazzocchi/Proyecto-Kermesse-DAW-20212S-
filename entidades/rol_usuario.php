<?php

class Rol_Usuario{
    //Atributos
    private $rol_usuario_id;
    private $usuario_id_usuario;
    private $rol_id_rol;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
