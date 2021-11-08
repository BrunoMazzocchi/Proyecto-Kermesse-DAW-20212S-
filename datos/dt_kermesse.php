<?php
include_once("conexion.php");

class Dt_Kermesse extends Conexion
{
     public function listKermesse(){
         try
         {
             $this->myCon = parent::conectar();
             $result = array();
             $querySQL = "SELECT * FROM dbkermesse.tbl_kermesse";

             $stm = $this->myCon->prepare($querySQL);
             $stm->execute();

             foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)  {
                $kerme = new Kermesse();
                $kerme->__SET('id_kermesse', $kerme->$id_kermesse);
                $kerme->__SET('idParroquia', $kerme->$idParroquia);
                $kerme->__SET('nombre', $kerme->$nombre);
                $kerme->__SET('fInicio', $kerme->$fInicio);
                $kerme->__SET('fFinal', $kerme->$fFinal);
                $kerme->__SET('descripcion', $kerme->$descripcion);
                $kerme->__SET('estado', $kerme->$estado);
                $kerme->__SET('usuario_creacion', $kerme->$usuario_creacion);
                $kerme->__SET('usuario_modificacion', $kerme->$usuario_modificacion);
                $kerme->__SET('fecha_modificacion', $kerme->$fecha_modificacion);
                $kerme->__SET('id_kermesse', $kerme->$usuario_eliminacion);
                $kerme->__SET('id_kermesse', $kerme->$fecha_eliminacion);
                $result[] = $reg;
          
             }
             $this->myCon = parent::desconectar();
             return $result;
         }
         catch(Exception $e)
         {
             die($e->getMessage()); 
         }
     }

}
