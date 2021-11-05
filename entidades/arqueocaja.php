<?php

class Arqueocaja{
    //Atributos
    
    private $arqueocaja_id;
    private $arqueocaja_kermesse_id;
    private $arqueocaja_fechaArqueo;
    private $arqueocaja_granTotal;
    private $arqueocaja_usuario_creacion;
    private $arqueocaja_fechaCreacion;
    private $arqueocaja_usuarioCreacion;
    private $arqueocaja_fechaModificacion;
    private $arqueocaja_usuario_eliminacion;
    private $arqueocaja_fechaEliminacion;
    private $arqueocaja_estado;



    //Metodos
    public function _GET($k){return $this->$k;}
    public function _SET($k, $v){return $this-> $k = $v;}
}

