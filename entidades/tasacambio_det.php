<?php

class Tasacambio_Det{
    //Atributos
    
    private $id_tasaCambio_det;
    private $id_tasaCmabio;
    private $fecha;
    private $tipoCambio;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}