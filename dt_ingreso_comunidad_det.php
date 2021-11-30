<?php

include_once ("conexion.php");
include_once("../entidades/ingreso_comunidad_det.php");

class Dt_Ingreso_Comunidad_Det extends Conexion {


public function listIngresoComunidadDet(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad_det";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $icd = new ingreso_comunidad_det(); 

            $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
            $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
            $icd->__SET('id_bono', $r->id_bono);
            $icd->__SET('denominacion', $r->denominacion);
            $icd->__SET('cantidad', $r->cantidad);
            $icd->__SET('subtotal_bono', $r->subtotal_bono); 

            $result[] = $icd; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}

public function obtenerIngresoComunidadDet($id)
{
    try {
        $this->myCon = parent::conectar();
        $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad_det WHERE id_ingreso_comunidad_det = ?;";
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(array($id));

        $r = $stm->fetch(PDO::FETCH_OBJ);
        $icd = new Productos();
        $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
        $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
        $icd->__SET('id_bono', $r->id_bono);
        $icd->__SET('denominacion', $r->denominacion);
        $icd->__SET('cantidad', $r->cantidad);
        $icd->__SET('subtotal_bono', $r->subtotal_bono); 
        $this->myCon = parent::desconectar();
        return $icd;
    } catch (Exception $e) {
        die($e->getMessage());
    }

    
}

public function regIngresoComunidadDet(Ingreso_Comunidad_Det $icd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad_det (id_ingreso_comunidad_det, id_ingreso_comunidad, id_bono,
                                              denominacion, cantidad, subtotal_bono)
            VALUES (?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                  
                    $icd->__SET('id_ingreso_comunidad_det'),
                    $icd->__SET('id_ingreso_comunidad'),
                    $icd->__SET('id_bono'),
                    $icd->__SET('denominacion'),
                    $icd->__SET('cantidad'),
                    $icd->__SET('subtotal_bono'),
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editIngresoComunidadDet(Ingreso_Comunidad_Det $icd)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_ingreso_comunidad_det SET

            id_ingreso_comunidad = ?,
            id_bono = ?,
            denominacion = ?,
            cantidad = ?, 
            subtotal_bono = ? WHERE id_ingreso_comunidad_det = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
            
                    $icd->__SET('id_ingreso_comunidad'),
                    $icd->__SET('id_bono'),
                    $icd->__SET('denominacion'),
                    $icd->__SET('cantidad'),
                    $icd->__SET('subtotal_bono'),
                    $icd->__SET('id_ingreso_comunidad_det'),
        
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteIngresoComunidadDet($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.tbl_ingreso_comunidad_det WHERE id_ingreso_comunidad_det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
