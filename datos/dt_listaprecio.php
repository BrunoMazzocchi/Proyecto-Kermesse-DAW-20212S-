<?php
include_once("conexion.php");
include_once("../entidades/lista_precio.php");

class Dt_ListaPrecio extends Conexion
{
    public function listListaPrecio()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $lstPrecio = new kermesse();

                $lstPrecio->__SET('id_lista_precio', $r->id_lista_precio);
                $lstPrecio->__SET('id_kermesse', $r->id_kermesse);
                $lstPrecio->__SET('nombre', $r->nombre);
                $lstPrecio->__SET('descripcion', $r->descripcion);
                $lstPrecio->__SET('estado', $r->estado);

                $result[] = $lstPrecio;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
