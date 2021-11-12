<?php

include_once("conexion.php");

class Dt_categoria_gastos extends Conexion{

  private $myCon;

  public function ListaCG()
  {
      try
      {
        $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm -> fetchAll(PDO::FETCH_OBJ)as $r);
            {
                $tcg = new Tbl_Categoria_Gastos();

                $tcg->_SET('id_categoria_gastos', $r->id_categoria_gastos);
                $tcg->_SET('nombre_categoria', $r->nombre_categoria);
                $tcg->_SET('descripcion', $r->descripcion);
                $tcg->_SET('estado', $r->estado);

                $result[] = $tcg;
            }
            $this -> myCon = parent::desconectar();
            return $result;
      }
      catch(Exception $e)
      {

      }
  }

  public function getCG($id){
    try{
        $this->myCon = parent::conectar();
        $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos WHERE id_categoria_gastos = ?";
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(array($id));

        $r=$stm->fetch(PDO::FETCH_OBJ);
        $tcg = new Tbl_Categoria_Gastos();

        $tcg->_SET('id_categoria_gastos', $r->id_categoria_gastos);
        $tcg->_SET('nombre_categoria', $r->nombre_categoria);
        $tcg->_SET('descripcion', $r->descripcion);
        $tcg->_SET('estado', $r->estado);

        $this->myCon = parent::desconectar();
        return $tcg;


    }

    catch (Exception $cg)
    {
        die($cg->getMessage());
    }
}

}