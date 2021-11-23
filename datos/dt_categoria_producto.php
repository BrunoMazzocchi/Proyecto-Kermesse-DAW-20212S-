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
            $cpt = new Categoria_Producto(); 

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

public function regCategoriaProducto(categoria_producto $cpt){
    try {
        $this->myCon = parent::conectar();
        $sql = "INSERT INTO dbkermesse.tbl_categoria_producto (id_categoria_producto, nombre, descripcion, estado
        VALUES (?,?,?,?)";
        $this->myCon->prepare($sql)
        ->execute(array(

            $cpt->__GET('id_categoria_producto'),
            $cpt->__GET('nombre'),
            $cpt->__GET('descripcion'),
            $cpt->__GET('estado')
            ));

        $this->myCon = parent::desconectar();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
public function obtenerCategoria($id)
{
    try {
        $this->myCon = parent::conectar();
        $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto WHERE id_categoria_producto = ?";
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(array($id));

        $r = $stm->fetch(PDO::FETCH_OBJ);
        $cpt = new Categoria_Producto();

        $cpt->__SET('id_categoria_producto', $r->id_categoria_producto);
        $cpt->__SET('nombre', $r->nombre);
        $cpt->__SET('descripcion', $r->descripcion);
        $cpt->__SET('estado', $r->estado);

        $this->myCon = parent::desconectar();
        return $cpt;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

    public function editCategoria(Categoria_Producto $cpt)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_categoria_producto SET
    
            nombre = ?,
            descripcion = ?,
            estado = ? WHERE id_categoria_producto = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                  
                    $cpt->__GET('nombre'),
                    $cpt->__GET('descripcion'),
                    $cpt->__GET('estado'),
        
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteCategoria($idCP)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.tbl_categoria_producto WHERE id_categoria_producto = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idCP));
            $this->myCon = parent::desconectar();
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}