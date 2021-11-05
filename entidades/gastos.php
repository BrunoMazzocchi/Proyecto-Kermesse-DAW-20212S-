<?php

class Gastos{
    //Atributos
    
    private $registros_id_gastos;
    private $kermesse_id;
    private $categoria_id_gastos;
    private $gastos_fecha;
    private $gastos_concepto;
    private $gastos_monto;
    private $gastos_usuario_creacion;
    private $gastos_fecha_creacionl;
    private $usuario_modificacion;
    private $gastos_fecha_modificacion;
    private $usuario_eliminacion;
    private $gastos_usuario_eliminacion;
    private $gastos_estado;


    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

