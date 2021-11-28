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
                $lstPrecioDet->__SET('nombreListaPrecio', $r->nombreListaPrecio);
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

    public function obtenerLista($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM vw_listapreciodet_listaprecio_producto WHERE id_lista_precio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $lstPrecio = new Lista_Precio_Det();

            $lstPrecio->__SET('id_listaprecio_det', $r->id_listaprecio_det);
            $lstPrecio->__SET('id_lista_precio', $r->id_lista_precio);
            $lstPrecio->__SET('id_producto', $r->id_producto);
            $lstPrecio->__SET('nombrProducto', $r->nombrProducto);
            $lstPrecio->__SET('nombreListaPrecio', $r->nombreListaPrecio);
            $lstPrecio->__SET('precio_venta', $r->precio_venta);


            $this->myCon = parent::desconectar();
            return $lstPrecio;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function regListaPrecioDet(Lista_Precio_Det $lstPrecio)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_listaprecio_det (id_listaprecio_det, id_lista_precio, id_producto, precio_venta)
            VALUES (?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(

                    $lstPrecio->__GET('id_lista_precio'),
                    $lstPrecio->__GET('id_kermesse'),
                    $lstPrecio->__GET('id_producto'),
                    $lstPrecio->__GET('precio_venta'),
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editListaPrecioDet(Lista_Precio_Det $lstPrecio)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_listaprecio_det SET
            id_lista_precio = ?,
            id_producto = ?,
            precio_venta = ? WHERE id_listaprecio_det = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $lstPrecio->__GET('id_lista_precio'),
                    $lstPrecio->__GET('id_producto'),
                    $lstPrecio->__GET('precio_venta'),
                    $lstPrecio->__GET('id_listaprecio_det'),
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
