<?php
include_once("conexion.php");
include_once("../entidades/lista_precio.php");
include_once("../entidades/vw_listaprecio_kermesse.php");

class Dt_ListaPrecio extends Conexion
{
    public function listListaPrecio()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_listaprecio_kermesse ";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $lstPrecio = new Lista_Precio();

                $lstPrecio->__SET('id_lista_precio', $r->id_lista_precio);
                $lstPrecio->__SET('nombreKermesse', $r->nombreKermesse);
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
