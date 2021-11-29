<?php

class Tasacambio{
    //Atributos
    
    private $id_tasaCambio;
    private $id_monedaO;
    private $id_monedaC;
    private $mes;
    private $anio;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}