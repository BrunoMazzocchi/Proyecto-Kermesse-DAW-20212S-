<?php
include_once("conexion.php");

class Dt_moneda extends Conexion{
    private $myCon;
    public function listMoneda()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_moneda;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $mon = new Tbl_Moneda();
                $mon->_SET('nombre', $r->nombre);
                $mon->_SET('simbolo', $r->simbolo);
                $mon->_SET('estado', $r->estado);
                $result[] = $mon; 
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