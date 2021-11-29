<?php
include_once("conexion.php");

class Dt_tasacambio extends Conexion{
    private $myCon;
    public function listTasacambio()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_tasacambio WHERE estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $Vtc = new Vw_tasacambio();
                $Vtc->_SET('id_tasaCambio', $r->id_tasaCambio);
                $Vtc->_SET('nombreO', $r->nombreO);
                $Vtc->_SET('nombreC', $r->nombreC);
                $Vtc->_SET('mes', $r->mes);
                $Vtc->_SET('anio', $r->anio);
                $Vtc->_SET('estado', $r->estado);
                $result[] = $Vtc; 
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerTasacambio($id)
    {
        try
        {   
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_tasacambio WHERE id_tasaCambio = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tc = new Vw_tasacambio();

            $tc->_SET('id_tasaCambio', $r->id_tasaCambio);
            $tc->_SET('nombreO', $r->nombreO);
            $tc->_SET('nombreC', $r->nombreC);
            $tc->_SET('mes', $r->mes);
            $tc->_SET('anio', $r->anio);

            $this->myCon = parent::desconectar();
            return $tc;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegistarTasaCambio(tasaCambio $tc){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "INSERT INTO dbkermesse.tbl_tasacambio (id_monedaO, id_monedaC, mes, anio, estado) VALUES(?, ?, ?, ?, 1);";

            $this->myCon->prepare($querySQL)
            ->execute(array(
                $tc->_GET('id_monedaO'),
                $tc->_GET('id_monedaC'),
                $tc->_GET('mes'),
                $tc->_GET('anio'),
            ));

            $this->myCon = parent::desconectar();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function editTasaCambio(tasaCambio $tc){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_tasacambio SET id_monedaO=?, id_monedaC=?, mes=?, anio=?, estado = 2 WHERE id_tasaCambio = ?";

            $stm = $this->myCon->prepare($querySQL);
            $stm -> execute(array(
                
                $tc->_GET('id_monedaO'),
                $tc->_GET('id_monedaC'),
                $tc->_GET('mes'),
                $tc->_GET('anio'),
                $tc->_GET('id_tasaCambio'),
            ));
            $this->myCon = parent::desconectar();

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function deleteTasaCambio($id){
        try{
            $this->myCon = parent::conectar(); 
            $querySQL = "UPDATE dbkermesse.tbl_tasacambio SET estado = 3 WHERE tbl_tasacambio.id_tasaCambio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm -> execute(array($id));            
            $this->myCon = parent::desconectar(); 
        }catch(Exception $e){
            die($e->getMessage()); 
        }

    }
}