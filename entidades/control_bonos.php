<?php

class Control_bonos{
    //Atributos
    private $bono_id;
    private $bono_nombre;
    private $bono_valor;
    private $bono_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
