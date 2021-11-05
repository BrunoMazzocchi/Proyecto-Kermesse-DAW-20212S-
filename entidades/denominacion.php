<?php

class Denominacion{
    //Atributos
    private $denominacion_id;
    private $denominacion_id_moneda;
    private $denominacion_valor;
    private $denomicacion_valor_letras;
    private $denomicacion_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
