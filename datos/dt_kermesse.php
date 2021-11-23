<?php
include_once("conexion.php");
include_once("../entidades/kermesse.php");
include_once("../entidades/vw_kermesse_parroquia.php");

class Dt_Kermesse extends Conexion
{
    public function listKermesse()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_kermesse_parroquia";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $kerme = new Kermesse();

                $kerme->__SET('id_kermesse', $r->id_kermesse);
                $kerme->__SET('idParroquia', $r->idParroquia);
                $kerme->__SET('nombreParroquia', $r->nombreParroquia);
                $kerme->__SET('nombreKermesse', $r->nombreKermesse);
                $kerme->__SET('fInicio', $r->fInicio);
                $kerme->__SET('fFinal', $r->fFinal);
                $kerme->__SET('descripcion', $r->descripcion);
                $kerme->__SET('estado', $r->estado);
                $kerme->__SET('usuario_creacion', $r->usuario_creacion);
                $kerme->__SET('fecha_creacion', $r->fecha_creacion);
                $kerme->__SET('usuario_modificacion', $r->usuario_modificacion);
                $kerme->__SET('fecha_modificacion', $r->fecha_modificacion);
                $kerme->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $kerme->__SET('fecha_eliminacion', $r->fecha_eliminacion);

                $result[] = $kerme;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerKerme($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_kermesse_parroquia WHERE id_kermesse = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $kerme = new Kermesse();

            $kerme->__SET('id_kermesse', $r->id_kermesse);
            $kerme->__SET('idParroquia', $r->idParroquia);
            $kerme->__SET('nombreParroquia', $r->nombreParroquia);
            $kerme->__SET('nombreKermesse', $r->nombreKermesse);
            $kerme->__SET('fInicio', $r->fInicio);
            $kerme->__SET('fFinal', $r->fFinal);
            $kerme->__SET('descripcion', $r->descripcion);
            $kerme->__SET('estado', $r->estado);
            $kerme->__SET('usuario_creacion', $r->usuario_creacion);
            $kerme->__SET('fecha_creacion', $r->fecha_creacion);
            $kerme->__SET('usuario_modificacion', $r->usuario_modificacion);
            $kerme->__SET('fecha_modificacion', $r->fecha_modificacion);
            $kerme->__SET('usuario_eliminacion', $r->usuario_eliminacion);
            $kerme->__SET('fecha_eliminacion', $r->fecha_eliminacion);

            $this->myCon = parent::desconectar();
            return $kerme;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regKermesse(Kermesse $kerme)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_kermesse (id_kermesse, idParroquia, nombre, fInicio, fFinal, descripcion, estado, usuario_creacion, fecha_creacion)
            VALUES (?,?,?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $kerme->__GET('id_kermesse'),
                    $kerme->__GET('idParroquia'),
                    $kerme->__GET('nombre'),
                    $kerme->__GET('fInicio'),
                    $kerme->__GET('fFinal'),
                    $kerme->__GET('descripcion'),
                    $kerme->__GET('estado'),
                    $kerme->__GET('usuario_creacion'),
                    $kerme->__GET('fecha_creacion'),


                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function editKerme(Kermesse $kerme)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_kermesse SET
            idParroquia = ?,
            nombre = ?,
            fInicio = ?, 
            fFinal = ?, 
            descripcion = ?, 
            estado = ?, 
            usuario_modificacion = ?,
            fecha_modificacion = ? WHERE id_kermesse = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $kerme->__GET('idParroquia'),
                    $kerme->__GET('nombre'),
                    $kerme->__GET('fInicio'),
                    $kerme->__GET('fFinal'),
                    $kerme->__GET('descripcion'),
                    $kerme->__GET('estado'),
                    $kerme->__GET('usuario_modificacion'),
                    $kerme->__GET('fecha_modificacion'),
                    $kerme->__GET('id_kermesse'),
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteKermesse($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_kermesse SET estado = 3 WHERE id_kermesse = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
