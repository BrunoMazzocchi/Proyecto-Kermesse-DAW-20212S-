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
}