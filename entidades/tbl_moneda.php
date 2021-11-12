<?php

class Tbl_Moneda{
    //Atributos
    
    private $id_moneda;
    private $nombre;
    private $simbolo;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}