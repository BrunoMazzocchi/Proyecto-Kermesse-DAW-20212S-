<?php

class Categoria_Gastos{
    //Atributos
    
    private $categoria_gastos_id;
    private $categoria_nombre;
    private $categoria_descripcion;
    private $categoria_int;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

