<?php

class Vw_denominacion_moneda{
    //Atributos
    
    private $id_Denominacion;
    private $Moneda;
    private $valor;
    private $valor_letras;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}