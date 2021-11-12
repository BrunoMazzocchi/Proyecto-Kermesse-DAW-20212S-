<?php

class vw_listapreciodet_listaprecio_producto{
    //Atributos
    
    private $id_listaprecio_det;
    private $id_lista_precio;
    private $id_producto;
    private $precio_venta;
    private $nombreProducto;

    //Metodos
    public function __GET($k){return $this->$k;}
    public function __SET($k, $v){return $this-> $k = $v;}
}

