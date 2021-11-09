<?php
include_once("conexion.php");
include_once("../entidades/parroquia.php");

class Dt_Parroquia extends Conexion
{
    public function listParroquia()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_parroquia";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $parro = new parroquia();

                $parro->__SET('idParroquia', $r->idParroquia);
                $parro->__SET('nombre', $r->nombre);
                $parro->__SET('direccion', $r->direccion);
                $parro->__SET('telefono', $r->telefono);
                $parro->__SET('parroco', $r->parroco);
                $parro->__SET('logo', $r->logo);
                $parro->__SET('sitio_web', $r->sitio_web);

                $result[] = $parro;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
