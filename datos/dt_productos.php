<?php

include_once ("conexion.php");
include_once("../entidades/productos.php");

class Dt_Productos extends Conexion {


public function listProductos(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_productos";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $p = new producto(); 

            $p->__SET('id_producto', $r->id_producto);
            $p->__SET('id_comunidad', $r->id_comunidad);
            $p->__SET('id_categoria_producto', $r->id_categoria_producto);
            $p->__SET('nombre', $r->nombre);
            $p->__SET('descripcion', $r->descripcion); 
            $p->__SET('cantidad', $r->cantidad);
            $p->__SET('preciov_sugerido', $r->preciov_sugerido);
            $p->__SET('estado', $r->estado); 

            $result[] = $p; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}



}