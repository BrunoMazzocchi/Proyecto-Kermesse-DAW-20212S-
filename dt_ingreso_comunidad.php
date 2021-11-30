<?php

include_once ("conexion.php");
include_once("../entidades/ingreso_comunidad.php");
include_once("../entidades/vw_ingresocomunidad_kermesse_comunidad_producto.php");

class Dt_Ingreso_Comunidad extends Conexion {


public function listIngresoComunidad(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $ic = new Ingreso_Comunidad(); 

            $ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
            $ic->__SET('id_kermesse', $r->id_kermesse);
            $ic->__SET('id_comunidad', $r->id_comunidad);
            $ic->__SET('id_producto', $r->id_producto);
            $ic->__SET('nombreKermesse', $r->nombreKermesse);
            $ic->__SET('nombreComunidad', $r->nombreComunidad);
            $ic->__SET('nombreProducto', $r->nombreProducto);
            $ic->__SET('cant_productos', $r->cant_productos);
            $ic->__SET('total_bonos', $r->total_bonos);
            $ic->__SET('usuario_creacion', $r->usuario_creacion);
            $ic->__SET('fecha_creacion', $r->fecha_creacion); 
            $ic->__SET('usuario_modificacion', $r->usuario_modificacion);
            $ic->__SET('fecha_modificacion', $r->fecha_modificacion);
            $ic->__SET('usuario_eliminacion', $r->usuario_eliminacion); 
            $ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);

            $result[] = $ic; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}
public function obtenerIngresoComunidad($id)
{
    try {
        $this->myCon = parent::conectar();
        $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad WHERE id_ingreso_comunidad = ?;";
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(array($id));

        $r = $stm->fetch(PDO::FETCH_OBJ);
        $ic = new Ingreso_Comunidad();

        $ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
        $ic->__SET('id_kermesse', $r->id_kermesse);
        $ic->__SET('id_comunidad', $r->id_comunidad);
        $ic->__SET('id_producto', $r->id_producto);
        $ic->__SET('nombreKermesse', $r->nombreKermesse);
        $ic->__SET('nombreComunidad', $r->nombreComunidad);
        $ic->__SET('nombreProducto', $r->nombreProducto);
        $ic->__SET('cant_productos', $r->cant_productos);
        $ic->__SET('total_bonos', $r->total_bonos);

        $this->myCon = parent::desconectar();
        return $ic;
    } catch (Exception $e) {
        die($e->getMessage());
    }

    
}

public function regIngresoComunidad(Ingreso_Comunidad $ic)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad (id_ingreso_comunidad, id_kermesse, id_comunidad,
                                              id_producto, cant_productos, total_bonos, usuario_creacion, fecha_creacion)
            VALUES (?,?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                  
                    $ic->__SET('id_ingreso_comunidad'),
                    $ic->__SET('id_kermesse'),
                    $ic->__SET('id_comunidad'),
                    $ic->__SET('id_producto'),
                    $ic->__SET('cant_productos'), 
                    $ic->__SET('total_bonos'),
                    $ic->__SET('usuario_creacion'),
                    $ic->__SET('fecha_creacion'),
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editIngresoComunidad(Ingreso_Comunidad $ic)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_ingreso_comunidad SET
    
            id_kermesse = ?,
            id_comunidad = ?,
            id_producto = ?,
            cant_productos = ?,
            total_bonos = ?,
            usuario_modificacion = ?, 
            fecha_modificacion = ?, 
             WHERE id_ingreso_comunidad = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
              
                    $ic->__SET('id_kermesse'),
                    $ic->__SET('id_comunidad'),
                    $ic->__SET('id_producto'),
                    $ic->__SET('cant_productos'), 
                    $ic->__SET('total_bonos'),
                    $ic->__SET('usuario_modificacion'),
                    $ic->__SET('fecha_modificacion'),
                    $ic->__SET('id_ingreso_comunidad'),
        
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteIngresoComunidad($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_gastos SET estado = 3 WHERE id_ingreso_comunidad = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}