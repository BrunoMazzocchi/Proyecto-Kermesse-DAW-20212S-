<?php

class Lista_Precio{
    //Atributos

    private $lista_precio_id;
    private $kermesse_id;
    private $lista_precio_nombre;
    private $lista_precio_descripcion;
    private $lista_precio_estado;
    
    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
