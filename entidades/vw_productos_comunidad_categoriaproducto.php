<?php

class Vw_Productos_Comunidad_CategoriaProducto {
    private $id_producto;
    private $id_comunidad; 
    private $id_categoria_producto; 
    private $nombre; 
    private $descripcion;
    private $cantidad; 
    private $preciov_sugerido; 
    private $estado; 

    public function __GET($k){return $this->$k;}
    public function __SET($k, $v){return $this->$k = $v;}

}