<?php

class Lista_Precio_Det{
    //Atributos
    
    private $id_listaprecio_det;
    private $id_lista_precio;
    private $id_producto;
    private $precio_venta;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

