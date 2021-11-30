<?php
include_once("conexion.php");

class Dt_tasacambio_det extends Conexion{
    private $myCon;
    public function listTasacambioDet()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det WHERE estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tcd = new Tasacambio_Det();
                $tcd->_SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tcd->_SET('id_tasaCambio', $r->id_tasaCambio);
                $tcd->_SET('fecha', $r->fecha);
                $tcd->_SET('tipoCambio', $r->tipoCambio);
                $tcd->_SET('estado', $r->estado);
                $result[] = $tcd; 
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerTasacambioDet($id)
    {
        try
        {   
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tasacambio_det WHERE id_tasaCambio_det = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tcd = new Tasacambio_Det();

                $tcd->_SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tcd->_SET('id_tasaCambio', $r->id_tasaCambio);
                $tcd->_SET('fecha', $r->fecha);
                $tcd->_SET('tipoCambio', $r->tipoCambio);
                $tcd->_SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $tcd;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegistarTasaCambioDet(Tasacambio_Det $tcd){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "INSERT INTO dbkermesse.tasacambio_det(id_tasaCambio, fecha, tipoCambio, estado) VALUES(?, ?, ?, 1);";

            $this->myCon->prepare($querySQL)
            ->execute(array(
                $tcd->_GET('id_tasaCambio'),
                $tcd->_GET('fecha'),
                $tcd->_GET('tipoCambio')
            ));

            $this->myCon = parent::desconectar();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function editTasaCambioDet(Tasacambio_Det $tcd){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tasacambio_det SET id_tasaCambio=?, fecha=?, tipoCambio=?, estado = 2 WHERE id_tasaCambio_det = ?";

            $stm = $this->myCon->prepare($querySQL);
            $stm -> execute(array(
                
                $tcd->_GET('id_tasaCambio'),
                $tcd->_GET('fecha'),
                $tcd->_GET('tipoCambio'),
                $tcd->_GET('id_tasaCambio_det')
            ));
            $this->myCon = parent::desconectar();

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function deleteTasaCambioDet($id){
        try{
            $this->myCon = parent::conectar(); 
            $querySQL = "UPDATE dbkermesse.tasacambio_det SET estado = 3 WHERE tasacambio_det.id_tasaCambio_det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm -> execute(array($id));            
            $this->myCon = parent::desconectar(); 
        }catch(Exception $e){
            die($e->getMessage()); 
        }

    }
}