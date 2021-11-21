<?php

include_once ("conexion.php");
include_once("../entidades/arqueocaja.php");

class Dt_Arqueocaja extends Conexion {



public function listArqueocaja(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $ac = new Arqueocaja(); 

            $ac->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $ac->_SET('idKermesse', $r->idKermesse);
            $ac->_SET('fechaArqueo', $r->fechaArqueo);
            $ac->_SET('granTotal', $r->granTotal);
            $ac->_SET('usuario_creacion', $r->usuario_creacion);
            $ac->_SET('fecha_creacion', $r->fecha_creacion); 
            $ac->_SET('usuario_modificacion', $r->usuario_modificacion);
            $ac->_SET('fecha_modificacion', $r->fecha_modificacion);
            $ac->_SET('usuario_eliminacion', $r->usuario_eliminacion); 
            $ac->_SET('fecha_eliminacion', $r->fecha_eliminacion);
            $ac->_SET('estado', $r->estado); 

            $result[] = $ac; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}
}