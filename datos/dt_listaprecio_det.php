<?php
include_once("conexion.php");
include_once("../entidades/listaprecio_det.php");

class Dt_ListaPrecioDet extends Conexion
{
    public function listListaPrecioDet()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM vw_listapreciodet_listaprecio_producto";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $lstPrecioDet = new Lista_Precio_Det();

                $lstPrecioDet->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $lstPrecioDet->__SET('id_lista_precio', $r->id_lista_precio);
                $lstPrecioDet->__SET('nombreProducto', $r->nombrProducto);
                $lstPrecioDet->__SET('id_producto', $r->id_producto);
                $lstPrecioDet->__SET('precio_venta', $r->precio_venta);
              
                $result[] = $lstPrecioDet;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
