<?php

include_once("conexion.php");

class Dt_categoria_gastos extends Conexion
{

    private $myCon;

    public function ListaCG()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos; ";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $cat = new Categoria_Gastos();

                $cat->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $cat->__SET('nombre_categoria', $r->nombre_categoria);
                $cat->__SET('descripcion', $r->descripcion);
                $cat->__SET('estado', $r->estado);

                $result[] = $cat;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function regCategoriaGastos(Categoria_Gastos $cat)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_categoria_gastos (id_categoria_gastos, nombre_categoria, descripcion, estado)
        VALUES (?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(

                    $cat->__GET('id_categoria_gastos'),
                    $cat->__GET('nombre_categoria'),
                    $cat->__GET('descripcion'),
                    $cat->__GET('estado')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerCategoriaGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos WHERE id_categoria_gastos = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tcg = new Categoria_Gastos();

            $tcg->__SET('id_categoria_gastos', $r->id_categoria_gastos);
            $tcg->__SET('nombre_categoria', $r->nombre_categoria);
            $tcg->__SET('descripcion', $r->descripcion);
            $tcg->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $tcg;
        } catch (Exception $cg) {
            die($cg->getMessage());
        }
    }

    public function editarCategoriaGastos(Categoria_Gastos $cat)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_categoria_gastos SET
        nombre_categoria = ?,
        descripcion = ?,
        estado = ? WHERE id_categoria_gastos = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $cat->__GET('nombre_categoria'),
                    $cat->__GET('descripcion'),
                    $cat->__GET('estado'),
                    $cat->__GET('id_categoria_gastos'),

                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function deleteCategoriaGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_categoria_gastos WHERE id_categoria_gastos = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
