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
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE estado <> 3;";

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

    public function editRol(Rol $rol)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_rol SET
            rol_descripcion = ?,
            estado = ?
            WHERE id_rol = ?;";

            $this->myCon->prepare($sql)
             ->execute(
            array(
                $rol->_GET('rol_descripcion'),
                $rol->_GET('estado'),
                $rol->_GET('id_rol')
             )
            );
             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function obtenerRol($id)
    {
        try
        {   
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE id_rol = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $rol = new Rol();

            $rol->_SET('id_rol', $r->id_rol);
            $rol->_SET('rol_descripcion', $r->rol_descripcion);
            $rol->_SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $rol;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deleteRol($idR)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_rol SET estado = 3 WHERE id_rol = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idR));

            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getIdRol($username)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "select id_rol from  dbkermesse.vw_rol_usuario where usuario = :usuario;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':usuario', $username, PDO::PARAM_STR, 40);
            $stm->execute();

            $result = $stm->fetchColumn(0);
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}