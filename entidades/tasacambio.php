<?php

class Tasacambio{
    //Atributos
    private $tasacambio_id;
    private $monedOa_id;
    private $monedaC_id;
    private $tasacambio_mes;
    private $tasacambio_anio;
    private $tasacambio_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
