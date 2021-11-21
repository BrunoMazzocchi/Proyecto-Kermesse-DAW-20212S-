<?php

include_once ("conexion.php");
include_once("../entidades/arqueocaja_det.php");

class Dt_Arqueocaja_Det extends Conexion {


public function listIngresoComunidadDet(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            
            $acd = new arqueocaja_det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('idArqueoCaja', $r->idArqueoCaja);
            $acd->_SET('idMoneda', $r->idMoneda);
            $acd->_SET('idDenominacion', $r->idDenominacion);
            $acd->_SET('usuario_creacion', $r->usuario_creacion);
            $acd->_SET('cantidad', $r->cantidad); 
            $acd->_SET('subtotal', $r->subtotal);

            $result[] = $acd; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}
}