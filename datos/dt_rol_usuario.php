<?php
include_once("conexion.php");

class Dt_rol_usuario extends Conexion{
    private $myCon;
    public function listRolUser()
    {
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_usuario;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rolU = new Vw_rol_usuario();
                $rolU->_SET('id_rol_usuario', $r->id_rol_usuario);
                $rolU->_SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $rolU->_SET('rol_descripcion', $r->rol_descripcion);
                $rolU->_SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                $rolU->_SET('usuario', $r->usuario);
                $result[] = $rolU; 
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegistrarRolUser(Rol_usuario $rolUs){
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.rol_usuario(id_rol_usuario,tbl_usuario_id_usuario,tbl_rol_id_rol)
            VALUES (?,?,?);";

            $this->myCon->prepare($sql)
             ->execute(array(
                $rolUs->_GET('id_rol_usuario'),
                $rolUs->_GET('tbl_usuario_id_usuario'),
                $rolUs->_GET('tbl_rol_id_rol')
             ));

             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }


}