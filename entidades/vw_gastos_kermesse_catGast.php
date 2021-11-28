<?php

class vw_gastos_kermesse_catGast{
    //Atributos
    
    private $id_registro_gastos;
    private $idKermesse;
    private $idCatGastos;
    private $nombreCat;
    private $nombreKermesse;
    private $fechaGasto;
    private $concepto;
    private $monto;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;
    private $fecha_eliminacion;
    private $estado;

    //Metodos
    public function __GET($k){return $this->$k;}
    public function __SET($k, $v){return $this-> $k = $v;}
}