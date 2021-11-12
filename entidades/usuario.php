<?php

class Usuario{

    private $id_usuariio;
    private $usuario;
    private $pwd;
    private $nombres;
    private $apellidos;
    private $email;
    private $estado;

    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}