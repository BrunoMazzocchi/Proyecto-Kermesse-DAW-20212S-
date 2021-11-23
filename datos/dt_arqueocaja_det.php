<?php

include_once ("conexion.php");

class Dt_Arqueocaja_Det extends Conexion {


public function listArqueoCajaDet(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            
            $acd = new arqueocaja_det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('idArqueoCaja', $r->idArqueoCaja);
            $acd->_SET('idMoneda', $r->idMoneda);
            $acd->_SET('idDenominacion', $r->idDenominacion);
            $acd->_SET('usuario_creacion', $r->usuario_creacion);
            $acd->_SET('cantidad', $r->cantidad); 
            $acd->_SET('subtotal', $r->subtotal);

            $result[] = $acd; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

    }

    public function regArqueoCajaDet(Arqueocaja_Det $acd)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO tbl_arqueocaja_det (id_ArqueoCaja_Det,idArqueoCaja,idMoneda,idDenominacion,usuario_creacion,cantidad,subtotal) 
            VALUES (?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $acd->_GET('id_ArqueoCaja_Det'),
                    $acd->_GET('idArqueoCaja'),
                    $acd->_GET('idMoneda'),
                    $acd->_GET('idDenominacion'),
                    $acd->_GET('usuario_creacion'),
                    $acd->_GET('cantidad'),
                    $acd->_GET('subtotal')
                ));
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerArqueoCajaSDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det WHERE id_ArqueoCaja_Det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $acd = new arqueocaja_det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('idArqueoCaja', $r->idArqueoCaja);
            $acd->_SET('idMoneda', $r->idMoneda);
            $acd->_SET('idDenominacion', $r->idDenominacion);
            $acd->_SET('usuario_creacion', $r->usuario_creacion);
            $acd->_SET('cantidad', $r->cantidad); 
            $acd->_SET('subtotal', $r->subtotal);

            $this->myCon = parent::desconectar();
            return $acd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editArqueoCajaDet(Arqueocaja_Det $acd)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_arqueocaja_det SET
            idArqueoCaja = ?,
            idMoneda = ?,
            idDenominacion = ?,
            usuario_creacion = ?,
            cantidad = ?,
            subtotal = ? WHERE id_ArqueoCaja = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $acd->_GET('idArqueoCaja'),
                    $acd->_GET('idMoneda'),
                    $acd->_GET('idDenominacion'),
                    $acd->_GET('usuario_creacion'),
                    $acd->_GET('cantidad'),
                    $acd->_GET('subtotal'),
                    $acd->_GET('id_ArqueoCaja_Det')

                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteArqueoCajaDet($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM tbl_arqueocaja_det WHERE id_ArqueoCaja_Det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}