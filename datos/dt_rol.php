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

    public function RegistrarRol(Rol $rol){
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_rol (id_rol,rol_descripcion,estado)
            VALUES (?,?,?)";

            $this->myCon->prepare($sql)
             ->execute(array(
                $rol->_GET('id_rol'),
                $rol->_GET('rol_descripcion'),
                $rol->_GET('estado')
             ));

             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }
}