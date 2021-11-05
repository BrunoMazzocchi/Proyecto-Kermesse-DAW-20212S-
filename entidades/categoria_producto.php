<?php

class categoria_producto{
    //Atributos
    private $categoria_id_producto;
    private $categoria_producto_nombre;
    private $categoria_producto_descripcion;
    private $categoria_estado;
    
    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
