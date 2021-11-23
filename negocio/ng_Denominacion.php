<?php

include_once("../entidades/tbl_denominacion.php");
include_once("../datos/dt_denominacion.php");

$den = new Tbl_Denominacion();
$dtDen = new Dt_denominacion;

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $den->__SET('id_Denominacion',$_POST['id_Denominacion']);
                $den->__SET('idMoneda',$_POST['idMoneda']);
                $den->__SET('valor',$_POST['valor']);
                $den->__SET('valor_letras',$_POST['valor_letras']);
                $den->__SET('estado', '1');

                $dtDen->regDenominacion($den);
                header("Location: ../pages/catalogos/tbl_denominacion.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_denominacion.php?msj=2");
            }
            break;

        case '2':
            try
            {
                $den->__SET('id_Denominacion',$_POST['id_Denominacion']);
                $den->__SET('idMoneda',$_POST['idMoneda']);
                $den->__SET('valor',$_POST['valor']);
                $den->__SET('valor_letras',$_POST['valor_letras']);
                $den->__SET('estado','2');

                $dtDen->editDenominacion($den);
                header("Location: ../pages/catalogos/tbl_denominacion.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_denominacion.php?msj=4");
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
                    $den->__SET('id_Denominacion', $_GET['delD']);
                    $dtDen->deleteDenominacion($den->__GET('id_Denominacion'));
                    header("Location: ../pages/catalogos/tbl_denominacion.php?msj=5");
            
                }
                catch(Exception $e)
                {
                    header("Location: ../pages/catalogos/tbl_denominacion.php?msj=6");
                    die($e->getMessage());
                }
            }