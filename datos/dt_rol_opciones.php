<?php
include_once("conexion.php");

class Dt_rol_opciones extends Conexion{
    private $myCon;
    public function listRolOp()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rolOp = new Vw_rol_opciones();
                $rolOp->_SET('id_rol_opciones', $r->id_rol_opciones);
                $rolOp->_SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $rolOp->_SET('rol_descripcion', $r->rol_descripcion);
                $rolOp->_SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
                $rolOp->_SET('opcion_descripcion', $r->opcion_descripcion);
                $result[] = $rolOp; 
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
