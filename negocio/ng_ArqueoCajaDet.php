<?php

include_once("../entidades/arqueocaja_det.php");
include_once("../datos/dt_arqueocaja_det.php");

$acd = new Arqueocaja_Det();
$dtAcd = new Dt_Arqueocaja_Det();

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $acd->_SET('idArqueoCaja_Det', $_POST['idArqueoCaja_Det']);
                $acd->_SET('idArqueoCaja', $_POST['idArqueoCaja']);
                $acd->_SET('idMoneda', $_POST['idMoneda']);
                $acd->_SET('idDenominacion', $_POST['idDenominacion']);
                $acd->_SET('cantidad', $_POST['cantidad']);
                $acd->_SET('subtotal', $_POST['subtotal']);
                
                $dtAcd->regArqueoCajaDet($acd);
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=2");
            }
            break;

        case '2':
            try
            {
                $acd->_SET('idArqueoCaja_Det', $_POST['idArqueoCaja_Det']);
                $acd->_SET('idArqueoCaja', $_POST['idArqueoCaja']);
                $acd->_SET('idMoneda', $_POST['idMoneda']);
                $acd->_SET('idDenominacion', $_POST['idDenominacion']);
                $acd->_SET('cantidad', $_POST['cantidad']);
                $acd->_SET('subtotal', $_POST['subtotal']);

                $dtAcd->editArqueoCajaDet($acd);
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=4");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}

if ($_GET)
            {
                try
                {
                    $acd->_SET('idArqueoCaja_Det', $_GET['delACD']);
                    $dtAcd->deleteArqueoCajaDet($acd->_GET('idArqueoCaja_Det'));
                    header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=5");
            
                }
                catch(Exception $e)
                {
                    header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=6");
                    die($e->getMessage());
                }
            }