<?php

include_once ("conexion.php");
include_once("../entidades/categoria_producto.php");

class Dt_Categoria_Producto extends Conexion {


public function listCategoriaProducto(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $cpt = new categoria_producto(); 

            $cpt->__SET('id_categoria_producto', $r->id_categoria_producto);
            $cpt->__SET('nombre', $r->nombre);
            $cpt->__SET('descripcion', $r->descripcion); 
            $cpt->__SET('estado', $r->estado); 

            $result[] = $cpt; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}



}