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

    
    public function RegistrarRolOpc(Rol_opciones $rolOp){
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.rol_opciones(tbl_rol_id_rol,tbl_opciones_id_opciones)
            VALUES (?,?);";

            $this->myCon->prepare($sql)
             ->execute(array(
                $rolOp->_GET('tbl_rol_id_rol'),
                $rolOp->_GET('tbl_opciones_id_opciones')
             ));

             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function editRolOp(Rol_opciones $rolOpc)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.rol_opciones SET
            tbl_rol_id_rol = ?,
            tbl_opciones_id_opciones = ?
            WHERE id_rol_opciones = ?;";

            $this->myCon->prepare($sql)
             ->execute(
            array(
                $rolOpc->_GET('tbl_rol_id_rol'),
                $rolOpc->_GET('tbl_opciones_id_opciones'),
                $rolOpc->_GET('id_rol_opciones')
             )
            );
             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function obtenerRolOp($id)
    {
        try
        {   
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones WHERE id_rol_opciones = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $rolOp = new Vw_rol_opciones();

            $rolOp->_SET('id_rol_opciones', $r->id_rol_opciones);
            $rolOp->_SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
            $rolOp->_SET('rol_descripcion', $r->rol_descripcion);
            $rolOp->_SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
            $rolOp->_SET('opcion_descripcion', $r->opcion_descripcion);

            $this->myCon = parent::desconectar();
            return $rolOp;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deleteRolOp($idRO)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_opciones WHERE id_rol_opciones = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idRO));

            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}
