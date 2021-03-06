<?php

include_once ("conexion.php");

class Dt_Control_Bonos extends Conexion {


public function listControlBonos(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $bono = new Tbl_Control_Bonos(); 

            $bono->__SET('id_bono', $r->id_bono);
            $bono->__SET('nombre', $r->nombre);
            $bono->__SET('valor', $r->valor);
            $bono->__SET('estado', $r->estado); 

            $result[] = $bono; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

}

public function regBono(Tbl_Control_Bonos $bono)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_control_bonos (id_bono,nombre,valor,estado)
            VALUES (?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $bono->__GET('id_bono'),
                    $bono->__GET('nombre'),
                    $bono->__GET('valor'),
                    $bono->__GET('estado')
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
            valor = ?,
            estado = ? WHERE id_bono = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $bono->__GET('nombre'),
                    $bono->__GET('valor'),
                    $bono->__GET('estado'),
                    $bono->__GET('id_bono')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteBono($idB)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE tbl_control_bonos SET estado = 3 WHERE id_bono = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idB));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

}