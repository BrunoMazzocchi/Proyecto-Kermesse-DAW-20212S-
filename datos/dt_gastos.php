<?php

include_once("conexion.php");
include_once("../entidades/gastos.php");

include_once("../entidades/vw_gastos_kermesse_catGast.php");

class Dt_gastos extends Conexion
{

    private $myCon;

    public function listGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_gastos_kermesse_catGast;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $gt = new Gastos();

                $gt->__SET('id_registro_gastos', $r->id_registro_gastos);
                $gt->__SET('nombreKermesse', $r->nombreKermesse);
                $gt->__SET('nombreCat', $r->nombreCat);
                $gt->__SET('idKermesse', $r->id_kermesse);
                $gt->__SET('idCatGastos', $r->id_categoria_gastos);
                $gt->__SET('fechaGasto', $r->fechaGasto);
                $gt->__SET('concepto', $r->concepto);
                $gt->__SET('monto', $r->monto);
                $gt->__SET('usuario_creacion', $r->usuario_creacion);
                $gt->__SET('fecha_creacion', $r->fecha_creacion);
                $gt->__SET('usuario_modificacion', $r->usuario_modificacion);
                $gt->__SET('fecha_modificacion', $r->fecha_modificacion);
                $gt->__SET('usuario_eliminacion', $r->estadusuario_eliminaciono);
                $gt->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $gt->__SET('estado', $r->estado);

                $result[] = $gt;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerGasto($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_gastos_kermesse_catGast WHERE id_registro_gastos = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $gt = new Gastos();

            $gt->__SET('id_registro_gastos', $r->id_registro_gastos);
            $gt->__SET('nombreKermesse', $r->nombreKermesse);
            $gt->__SET('nombreCat', $r->nombreCat);
            $gt->__SET('idKermesse', $r->id_kermesse);
            $gt->__SET('idCatGastos', $r->id_categoria_gastos);
              $gt->__SET('fechaGasto', $r->fechaGasto);
            $gt->__SET('concepto', $r->concepto);
            $gt->__SET('monto', $r->monto);


            $this->myCon = parent::desconectar();
            return $gt;
        } catch (Exception $cg) {
            die($cg->getMessage());
        }
    }

    public function regGastos(Gastos $gt)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_gastos (id_registro_gastos, idKermesse, idCatGastos, fechaGasto, concepto, monto, usuario_creacion, fecha_creacion, estado)
            VALUES (?,?,?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(

                    $gt->__GET('id_registro_gastos'),
                    $gt->__GET('idKermesse'),
                    $gt->__GET('idCatGastos'),
                    $gt->__GET('fechaGasto'),
                    $gt->__GET('concepto'),
                    $gt->__GET('monto'),
                    $gt->__GET('usuario_creacion'),
                    $gt->__GET('fecha_creacion'),
                    $gt->__GET('estado')



                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editGastos(Gastos $gt)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_gastos SET
            idKermesse = ?,
            idCatGastos = ?,
            fechaGasto = ?,
            concepto = ?,
            monto = ?,
            usuario_modificacion = ?,
            fecha_modificacion = ?,
            estado = ? WHERE id_registro_gastos = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $gt->__GET('idKermesse'),
                    $gt->__GET('idCatGastos'),
                    $gt->__GET('fechaGasto'),
                    $gt->__GET('concepto'),
                    $gt->__GET('monto'),
                    $gt->__GET('usuario_modificacion'),
                    $gt->__GET('fecha_modificacion'),
                    $gt->__GET('estado'),
                    $gt->__GET('id_registro_gastos')

                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_gastos SET estado = 3 WHERE id_registro_gastos = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
