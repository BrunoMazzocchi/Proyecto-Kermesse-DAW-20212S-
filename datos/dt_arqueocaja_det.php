<?php

include_once ("conexion.php");

class Dt_Arqueocaja_Det extends Conexion {


public function listArqueoCajaDet(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja_det_moneda_denom";
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            
            $acd = new Arqueocaja_Det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $acd->_SET('simbolo', $r->simbolo);
            $acd->_SET('moneda', $r->moneda);
            $acd->_SET('denominacion', $r->denominacion);
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
            $sql = "INSERT INTO tbl_arqueocaja_det (idArqueoCaja_Det,idArqueoCaja,idMoneda,idDenominacion,cantidad,subtotal) 
            VALUES (?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                    $acd->_GET('idArqueoCaja_Det'),
                    $acd->_GET('idArqueoCaja'),
                    $acd->_GET('idMoneda'),
                    $acd->_GET('idDenominacion'),
                    $acd->_GET('cantidad'),
                    $acd->_GET('subtotal')
                ));
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function obtenerArqueoCajaDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det WHERE idArqueoCaja_Det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $acd = new Arqueocaja_Det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('idArqueoCaja', $r->idArqueoCaja);
            $acd->_SET('idMoneda', $r->idMoneda);
            $acd->_SET('idDenominacion', $r->idDenominacion);
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
            cantidad = ?,
            subtotal = ? WHERE idArqueoCaja_Det = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
                    
                    $acd->_GET('idArqueoCaja'),
                    $acd->_GET('idMoneda'),
                    $acd->_GET('idDenominacion'),
                    $acd->_GET('cantidad'),
                    $acd->_GET('subtotal'),
                    $acd->_GET('idArqueoCaja_Det')

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
            $querySQL = "DELETE FROM tbl_arqueocaja_det WHERE idArqueoCaja_Det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerVwArqueoCajaDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja_det_moneda_denom WHERE idArqueoCaja_Det = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $acd = new Arqueocaja_Det(); 

            $acd->_SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
            $acd->_SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $acd->_SET('simbolo', $r->simbolo);
            $acd->_SET('moneda', $r->moneda);
            $acd->_SET('denominacion', $r->denominacion);
            $acd->_SET('cantidad', $r->cantidad); 
            $acd->_SET('subtotal', $r->subtotal);

            $this->myCon = parent::desconectar();
            return $acd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}