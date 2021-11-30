<?php

class Vw_arqueocaja_det_moneda_denom{
    //Atributos
    
    private $idArqueoCaja_Det;
    private $id_ArqueoCaja;
    private $simbolo;
    private $moneda;
    private $denominacion;
    private $cantidad;
    private $subtotal;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}