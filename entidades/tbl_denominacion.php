<?php

class Tbl_Denominacion{
    //Atributos
    
    private $id_Denominacion;
    private $idMoneda;
    private $valor;
    private $valor_letras;
    private $estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}