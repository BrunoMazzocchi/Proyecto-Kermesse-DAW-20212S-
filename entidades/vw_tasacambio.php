<?php

class Vw_tasacambio{
    //Atributos
    
    private $id_tasaCambio;
    private $nombreO;
    private $nombreC;
    private $mes;
    private $anio;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}