<?php

include_once("conexion.php");

class Dt_gastos extends Conexion{

  private $myCon;

    public function listagastos()
    {
        try 
        {
           $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ)as $r)
            {
                $gt = new Tbl_Categoria_Gastos();

                $gt->_SET('id_registro_gastos', $r->id_registro_gastos);
                $gt->_SET('idKermesse', $r->idKermesse);
                $gt->_SET('idCatGastos', $r->idCatGastos);
                $gt->_SET('fechaGasto', $r->fechaGasto);
                $gt->_SET('concepto', $r->concepto);
                $gt->_SET('monto', $r->monto);
                $gt->_SET('usuario_creacion', $r->usuario_creacion);
                $gt->_SET('fecha_creacion', $r->fecha_creacion);
                $gt->_SET('usuario_modificacion', $r->usuario_modificacion);
                $gt->_SET('fecha_modificacion', $r->fecha_modificacion);
                $gt->_SET('usuario_eliminacion', $r->estadusuario_eliminaciono);
                $gt->_SET('fecha_eliminacion', $r->fecha_eliminacion);
                $gt->_SET('estado', $r->estado);
                
                $result[] = $gt;
            }
            $this ->myCon = parent::desconectar();
            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function obtenerGasto($id){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_gastos WHERE id_registro_gastos = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r=$stm->fetch(PDO::FETCH_OBJ);
            $gt = new Tbl_Gastos();

                $gt->_SET('id_registro_gastos', $r->id_registro_gastos);
                $gt->_SET('idKermesse', $r->idKermesse);
                $gt->_SET('idCatGastos', $r->idCatGastos);
                $gt->_SET('fechaGasto', $r->fechaGasto);
                $gt->_SET('concepto', $r->concepto);
                $gt->_SET('monto', $r->monto);
                $gt->_SET('usuario_creacion', $r->usuario_creacion);
                $gt->_SET('fecha_creacion', $r->fecha_creacion);
                $gt->_SET('usuario_modificacion', $r->usuario_modificacion);
                $gt->_SET('fecha_modificacion', $r->fecha_modificacion);
                $gt->_SET('usuario_eliminacion', $r->estadusuario_eliminaciono);
                $gt->_SET('fecha_eliminacion', $r->fecha_eliminacion);
                $gt->_SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $gt;


        }

        catch (Exception $cg)
        {
            die($cg->getMessage());
        }
    }
}