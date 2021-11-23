<?php

class Vw_IngresoComunidad_Kermesse_Comunidad_Producto {
    private $id_ingreso_comunidad;
    private $id_kermesse;
    private $id_comunidad;
    private $id_producto;
    private $nombreKermesse;
    private $nombreComunidad;
    private $nombreproducto;
    private $cant_producto;
    private $total_bonos; 
    private $usuario_creacion; 
    private $fecha_creacion; 
    private $usuario_modificacion; 
    private $fecha_modificacion; 
    private $usuario_eliminacion; 
    private $fecha_eliminacion; 

    public function __GET($k){return $this->$k;}
    public function __SET($k, $v){return $this->$k = $v;}

}