<?php

class Moneda{
    //Atributos
    
    private $moneda_id;
    private $moneda_nombre;
    private $moneda_simbolo;
    private $moneda_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
