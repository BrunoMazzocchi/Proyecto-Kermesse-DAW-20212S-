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

    public function obtenerLista($id){
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_listaprecio_kermesse WHERE id_lista_precio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $lstPrecio = new Lista_Precio();

            $lstPrecio->__SET('id_lista_precio', $r->id_lista_precio);
            $lstPrecio->__SET('nombreKermesse', $r->nombreKermesse);
            $lstPrecio->__SET('id_kermesse', $r->id_kermesse);
            $lstPrecio->__SET('nombre', $r->nombre);
            $lstPrecio->__SET('descripcion', $r->descripcion);

            $this->myCon = parent::desconectar();
            return $lstPrecio;
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function regListaPrecio(Lista_Precio $lstPrecio)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_lista_precio (id_lista_precio, id_kermesse, nombre, descripcion, estado)
            VALUES (?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(

                    $lstPrecio->__GET('id_lista_precio'),
                    $lstPrecio->__GET('id_kermesse'),
                    $lstPrecio->__GET('nombre'),
                    $lstPrecio->__GET('descripcion'),
                    $lstPrecio->__GET('estado')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editListaPrecio(Lista_Precio $lstPrecio)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_lista_precio SET
            id_kermesse = ?,
            nombre = ?,
            descripcion = ?,
            estado = ? WHERE id_lista_precio = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $lstPrecio->__GET('id_kermesse'),
                    $lstPrecio->__GET('nombre'),
                    $lstPrecio->__GET('descripcion'),
                    $lstPrecio->__GET('estado'),
                    $lstPrecio->__GET('id_lista_precio'),

                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteLista($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_lista_precio WHERE id_lista_precio = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
