<?php
include_once("conexion.php");

class Dt_comunidad extends Conexion
{
    private $myCon;
    public function listComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad; ";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $cmn = new Comunidad();

                $cmn->__SET('id_comunidad', $r->id_comunidad);
                $cmn->__SET('nombre', $r->nombre);
                $cmn->__SET('responsable', $r->responsable);
                $cmn->__SET('desc_contribucion', $r->desc_contribucion);
                $cmn->__SET('estado', $r->estado);
           
                $result[] = $cmn;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function regComunidad(Comunidad $cmn)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_comunidad (id_comunidad, nombre, responsable, desc_contribucion, estado)
            VALUES (?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $cmn->__GET('id_comunidad'),
                    $cmn->__GET('nombre'),
                    $cmn->__GET('responsable'),
                    $cmn->__GET('desc_contribucion'),
                    $cmn->__GET('estado'),
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerComunidad($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad WHERE id_comunidad = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $oc = new Comunidad();

                $oc->__SET('id_comunidad', $r->id_comunidad);
                $oc->__SET('nombre', $r->nombre);
                $oc->__SET('responsable', $r->responsable);
                $oc->__SET('desc_contribucion', $r->desc_contribucion);
                $oc->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $oc;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editComunidad(Comunidad $cmn)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_comunidad SET
    
            nombre = ?,
            responsable = ?,
            desc_constribucion = ?, 
            estado = ? WHERE id_comunidad = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                  
                    $cmn->__GET('nombre'),
                    $cmn->__GET('responsable'),
                    $cmn->__GET('desc_contribucion'),
                    $cmn->__GET('estado'),
                    $cmn->__GET('id_comunidad'),
        
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteComunidad($idCm)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_comunidad SET estado = 3 WHERE id_comunidad = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idCm));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}