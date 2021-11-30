<?php

class Arqueocaja_Det{
    //Atributos
    
    private $idArqueoCaja_Det;
    private $idArqueoCaja;
    private $idMoneda;
    private $idDenominacion;
    private $cantidad;
    private $subtotal;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}