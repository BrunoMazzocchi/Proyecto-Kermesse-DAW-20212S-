<?php

class Lista_Precio_Det{
    //Atributos

    private $listaprecio_det;
    private $lista_precio_id;
    private $producto_id;
    private $precio_venta;

    
    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
