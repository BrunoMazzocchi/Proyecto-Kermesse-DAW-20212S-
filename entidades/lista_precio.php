<?php

class Lista_Precio{
    //Atributos
    
    private $id_lista_precio;
    private $id_kermesse;
    private $nombre;
    private $descripcion;
    private $estado;

    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

