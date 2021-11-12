<?php
include_once("conexion.php");

class Dt_rol extends Conexion{
    private $myCon;
    public function listRol()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol = new Rol();
                $rol->_SET('id_rol', $r->id_rol);
                $rol->_SET('rol_descripcion', $r->rol_descripcion);
                $rol->_SET('estado', $r->estado);
                $result[] = $rol; 
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

