<?php
include_once("conexion.php");
 
class Dt_opciones extends Conexion{
    private $myCon;
    public function listOpciones(){
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_opciones;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)  {
                $opc = new Opciones();
                $opc->_SET('id_opciones',$r->id_opciones);
                $opc->_SET('opcion_descripcion',$r->opcion_descripcion);
                $opc->_SET('estado',$r->estado);
                $result[] = $opc;
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