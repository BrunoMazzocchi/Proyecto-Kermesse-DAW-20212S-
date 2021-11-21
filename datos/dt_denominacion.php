<?php
include_once("conexion.php");
include_once("../entidades/tbl_denominacion.php");

class Dt_denominacion extends Conexion{

    private $myCon;
    public function listDenominacion(){
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_denominacion;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)  {
                $denom = new Tbl_Denominacion();
                $denom->__SET('id_Denominacion',$r->id_Denominacion);
                $denom->__SET('idMoneda', $r->idMoneda);
                $denom->__SET('valor', $r->valor);
                $denom->__SET('valor_letras', $r->valor_letras);
                $denom->__SET('estado', $r->estado);
                $result[] = $denom;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function regDenominacion(Tbl_Denominacion $denom)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_denominacion (idMoneda,valor,valor_letras)
            VALUES (?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $denom->__GET('idMoneda'),
                    $denom->__GET('valor'),
                    $denom->__GET('valor_letras')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerDenominacion($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_denominacion WHERE id_Denominacion = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $denom = new Tbl_Denominacion();

                $denom->__SET('id_Denominacion',$r->id_Denominacion);
                $denom->__SET('idMoneda', $r->idMoneda);
                $denom->__SET('valor', $r->valor);
                $denom->__SET('valor_letras', $r->valor_letras);
                $denom->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $denom;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editDenominacion(Tbl_Denominacion $denom)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_denominacion SET
            id_Denominacion = ?,
            idMoneda = ?, 
            valor = ?, 
            valor_letras = ? WHERE id_Denominacion = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $denom->__GET('id_Denominacion'),
                    $denom->__GET('idMoneda'),
                    $denom->__GET('valor'),
                    $denom->__GET('valor_letras')
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteDenominacion($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_denominacion WHERE id_Denominacion = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}