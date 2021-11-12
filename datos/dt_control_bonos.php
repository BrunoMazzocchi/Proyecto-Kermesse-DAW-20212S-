<?php

include_once ("conexion.php");
include_once("../entidades/control_bonos.php");

class Dt_Control_Bonos extends Conexion {


public function listControlBonos(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $cb = new control_bonos(); 

            $cb->__SET('id_bono', $r->id_bono);
            $cb->__SET('nombre', $r->nombre);
            $cb->__SET('valor', $r->valor);
            $cb->__SET('estado', $r->estado); 

            $result[] = $cb; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}



}