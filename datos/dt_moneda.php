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

                $mon->_SET('id_moneda', $r->id_moneda);
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

    public function regMoneda(Tbl_Moneda $mon)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_moneda (id_moneda,nombre,simbolo,estado) 
            VALUES (?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $mon->_GET('id_moneda'),
                    $mon->_GET('nombre'),
                    $mon->_GET('simbolo'),
                    $mon->_GET('estado')

                ));
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerMoneda($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_moneda WHERE id_moneda = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $mon = new Tbl_Moneda();

            $mon->_SET('id_moneda', $r->id_moneda);
            $mon->_SET('nombre', $r->nombre);
            $mon->_SET('simbolo', $r->simbolo);
            $mon->_SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $mon;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editMoneda(Tbl_Moneda $mon)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_moneda SET
            nombre = ?,
            simbolo = ?,
            estado = ? WHERE id_moneda = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $mon->_GET('nombre'),
                    $mon->_GET('simbolo'),
                    $mon->_GET('id_moneda')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteMoneda($idM)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE tbl_moneda SET estado = 3 WHERE id_moneda = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idM));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
}