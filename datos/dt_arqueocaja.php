<?php

include_once ("conexion.php");

class Dt_Arqueocaja extends Conexion {
    public function listArqueocaja(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja";
        
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $ac = new Arqueocaja(); 

                $ac->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $ac->_SET('idKermesse', $r->idKermesse);
                $ac->_SET('fechaArqueo', $r->fechaArqueo);
                $ac->_SET('granTotal', $r->granTotal);
                $ac->_SET('usuario_creacion', $r->usuario_creacion);
                $ac->_SET('fecha_creacion', $r->fecha_creacion); 
                $ac->_SET('usuario_modificacion', $r->usuario_modificacion);
                $ac->_SET('fecha_modificacion', $r->fecha_modificacion);
                $ac->_SET('usuario_eliminacion', $r->usuario_eliminacion); 
                $ac->_SET('fecha_eliminacion', $r->fecha_eliminacion);
                $ac->_SET('estado', $r->estado); 

                $result[] = $ac; 
            }

            $this->myCon = parent::desconectar(); 
            return $result; 

        }catch(Exception $e){
            die($e->getMessage()); 
        }
    }


    public function regArqueoCaja(Arqueocaja $ac)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_moneda (id_ArqueoCaja,idKermesse,fechaArqueo,granTotal,usuario_creacion,fecha_creacion,
                                            usuario_modificacion,fecha_modificacion,usuario_eliminacion,fecha_eliminacion,
                                            estado) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $ac->_GET('id_ArqueoCaja'),
                    $ac->_GET('idKermesse'),
                    $ac->_GET('fechaArqueo'),
                    $ac->_GET('granTotal'),
                    $ac->_GET('usuario_creacion'),
                    $ac->_GET('fecha_creacion'),
                    $ac->_GET('usuario_modificacion'),
                    $ac->_GET('fecha_modificacion'),
                    $ac->_GET('usuario_eliminacion'),
                    $ac->_GET('fecha_eliminacion'),
                    $ac->_GET('estado')

                ));
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerArqueoCaja($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_moneda WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $ac = new Arqueocaja();

                $ac->_SET('idKermesse', $r->idKermesse);
                $ac->_SET('fechaArqueo', $r->fechaArqueo);
                $ac->_SET('granTotal', $r->granTotal);
                $ac->_SET('usuario_creacion', $r->usuario_creacion);
                $ac->_SET('fecha_creacion', $r->fecha_creacion); 
                $ac->_SET('usuario_modificacion', $r->usuario_modificacion);
                $ac->_SET('fecha_modificacion', $r->fecha_modificacion);
                $ac->_SET('usuario_eliminacion', $r->usuario_eliminacion); 
                $ac->_SET('fecha_eliminacion', $r->fecha_eliminacion);
                $ac->_SET('estado', $r->estado);
                $ac->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);

            $this->myCon = parent::desconectar();
            return $ac;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editArqueoCaja(Arqueocaja $ac)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_arqueocaja SET
            idKermesse = ?,
            fechaArqueo = ?,
            granTotal = ?,
            usuario_creacion = ?,
            fecha_creacion = ?,
            usuario_modificacion = ?,
            fecha_modificacion = ?,
            usuario_eliminacion = ?,
            fecha_eliminacion = ?,
            estado = ? WHERE id_ArqueoCaja = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $ac->_GET('idKermesse'),
                    $ac->_GET('fechaArqueo'),
                    $ac->_GET('granTotal'),
                    $ac->_GET('usuario_creacion'),
                    $ac->_GET('fecha_creacion'),
                    $ac->_GET('usuario_modificacion'),
                    $ac->_GET('fecha_modificacion'),
                    $ac->_GET('usuario_eliminacion'),
                    $ac->_GET('fecha_eliminacion'),
                    $ac->_GET('estado'),
                    $ac->_GET('id_ArqueoCaja')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteArqueoCaja($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_arqueocaja WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}