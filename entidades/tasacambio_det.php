<?php

class TasaCambio_det{
    //Atributos
    private $tasaCambio_id;
    private $tasaCambio_det_id;
    private $tasaCambio_fecha;
    private $tasacambio_tipoCambio;
    private $tasaCambio_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
