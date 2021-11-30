<?php

class Vw_arqueocaja_det_arqueocaja{
    //Atributos
    
    private $id_ArqueoCaja;
    private $idArqueoCaja_Det;
    private $Kermesse;
    private $fArq;
    private $granTotal;
    private $moneda;
    private $simbolo;
    private $cantidad;
    private $subtotal;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}