<?php

include_once ("conexion.php");

class Dt_Arqueocaja extends Conexion {
    public function listArqueocaja(){
            try {
                $this->myCon = parent::conectar(); 
                $result = array(); 
                $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja_det_arqueocaja";
            
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(); 
    
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $ac = new Arqueocaja(); 
    
                    $ac->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                    $ac->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
                    $ac->_SET('Kermesse', $r->Kermesse);
                    $ac->_SET('fArq', $r->fArq);
                    $ac->_SET('granTotal', $r->granTotal);
                    $ac->_SET('usuario_creacion', $r->usuario_creacion); 
                    $ac->_SET('moneda', $r->moneda);
                    $ac->_SET('simbolo', $r->simbolo);
                    $ac->_SET('cantidad', $r->cantidad); 
                    $ac->_SET('subtotal', $r->subtotal);
                    $ac->_SET('estado', $r->estado); 
    
                    $result[] = $ac; 
                }
    
                $this->myCon = parent::desconectar(); 
                return $result; 
    
            }catch(Exception $e){
                die($e->getMessage()); 
            }
    }

    public function obtenerArqueoCaja($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
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

            $this->myCon = parent::desconectar();
            return $ac;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regArqueoCaja(Arqueocaja $ac)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_arqueocaja (id_ArqueoCaja,idKermesse,fechaArqueo,granTotal,usuario_creacion,fecha_creacion,estado) 
            VALUES (?,?,NOW(),?,?,NOW(),?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $ac->_GET('id_ArqueoCaja'),
                    $ac->_GET('idKermesse'),
                    $ac->_GET('fechaArqueo'),
                    $ac->_GET('granTotal'),
                    $ac->_GET('usuario_creacion'),
                    $ac->_GET('fecha_creacion'),
                    $ac->_GET('estado')

                ));
        }
        catch (Exception $e)
        {
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
            usuario_modificacion = ?,
            fecha_modificacion = NOW(),
            estado = ? WHERE id_ArqueoCaja = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $ac->_GET('idKermesse'),
                    $ac->_GET('fechaArqueo'),
                    $ac->_GET('granTotal'),
                    $ac->_GET('usuario_modificacion'),
                    $ac->_GET('fecha_modificacion'),
                    $ac->_GET('estado'),
                    $ac->_GET('id_ArqueoCaja')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteArqueoCaja($idAC)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE tbl_arqueocaja SET estado = 3 WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idAC));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerVwArqueoCaja($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja_det_arqueocaja WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $ac = new Arqueocaja();

            $ac->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $ac->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $ac->_SET('Kermesse', $r->Kermesse);
            $ac->_SET('fArq', $r->fArq);
            $ac->_SET('granTotal', $r->granTotal);
            $ac->_SET('usuario_creacion', $r->usuario_creacion); 
            $ac->_SET('moneda', $r->moneda);
            $ac->_SET('simbolo', $r->simbolo);
            $ac->_SET('cantidad', $r->cantidad); 
            $ac->_SET('subtotal', $r->subtotal);
            $ac->_SET('estado', $r->estado); 

            $this->myCon = parent::desconectar();
            return $ac;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}