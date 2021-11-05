<?php

class Productos{
    //Atributos
    private $producto_id;
    private $producto_id_comunidad;
    private $producto_id_cat;
    private $producto_nombre;
    private $producto_descripcion;
    private $producto_cantidad;
    private $producto_preciov_sugerido;
    private $producto_estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

