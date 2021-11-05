<?php

class Comunidad{
    //Atributos
    private $comunidad_id;
    private $comunidad_nombre;
    private $comunidad_responsable;
    private $comunidad_desc_contribucion;
    private $comunidad_estado;
    
    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}
