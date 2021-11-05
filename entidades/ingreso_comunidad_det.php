<?php

class ingreso_comunidad_det{
    //Atributos
    private $ingreso_comunidad_id;
    private $ingreso_comunidad_det_id;
    private $ingreso_comunidad_id_bono;
    private $ingreso_comunidad_denominacion;
    private $ingreso_comunidad_cantidad;
    private $ingreso_comunidad_subtotal_bono;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}