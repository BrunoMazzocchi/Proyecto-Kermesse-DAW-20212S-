<?php

class Parroquia{
    //Atributos
    
    private $idParroquia;
    private $nombre;
    private $direccion;
    private $telefono;
    private $parroco;
    private $logo;
    private $sitio_web;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

