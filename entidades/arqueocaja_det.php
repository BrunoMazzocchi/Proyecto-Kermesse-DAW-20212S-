<?php

class Arqueocaja_det{
    //Atributos
    
    private $arqueocaja_id_det;
    private $arqueocaja_id;
    private $arqueocaja_id_moneda;
    private $arqueocaja_id_denominacion;
    private $arqueocaja_cantidad_det;
    private $arqueocaja_subtotal_det;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

