<?php

class Usuario{
    //Atributos
    private $user_id;
    private $user;
    private $user_pwd;
    private $user_nombres;
    private $user_apellidos;
    private $user_email;
    private $user_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}