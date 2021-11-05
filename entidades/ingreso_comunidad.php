<?php

class ingreso_comunidad{
    //Atributos
    private $ingreso_comunidad_id;
    private $kermesse_id;
    private $comunidad_id;
    private $producto_id;
    private $cant_productos;
    private $total_bonos;
    private $usuario_creacion;
    private $ingreso_comunidad_fecha_creacion;
    private $ingreso_comunidad_usuario_modificacion;
    private $ingreso_comunidad_fecha_modificacion;
    private $ingreso_comunidad_usuario_usuario_eliminacion;
    private $ingreso_comunidad_fecha_eliminacion;
    
    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
