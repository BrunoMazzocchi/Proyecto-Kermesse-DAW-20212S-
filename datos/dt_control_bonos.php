<?php

include_once ("conexion.php");
include_once("../entidades/tbl_control_bonos.php");

class Dt_Control_Bonos extends Conexion {


public function listControlBonos(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $cb = new Tbl_Control_Bonos(); 

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

public function regBonos(Tbl_Control_Bonos $bono)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_control_bonos (id_bono,nombre,valor)
            VALUES (?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $bono->__GET('id_bono'),
                    $bono->__GET('nombre'),
                    $bono->__GET('valor')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerBono($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos WHERE id_bono = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $bono = new Tbl_Control_Bonos();

            $bono->__SET('id_bono', $r->id_bono);
            $bono->__SET('nombre', $r->nombre);
            $bono->__SET('valor', $r->valor);
            $bono->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $bono;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editBono(Tbl_Control_Bonos $bono)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_control_bonos SET
            nombre = ?,
            direccion = ? WHERE id_bono = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $bono->__GET('nombre'),
                    $bono->__GET('valor')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteBono($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_control_bonos WHERE id_bono = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

}