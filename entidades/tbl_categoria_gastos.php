<?php

class Tbl_Categoria_Gastos{
    //Atributos
    
    private $id_categoria_gastos;
    private $nombre_categoria;
    private $descripcion;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}