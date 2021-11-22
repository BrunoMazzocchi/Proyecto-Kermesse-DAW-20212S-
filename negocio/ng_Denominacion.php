<?php

include_once("../entidades/tbl_denominacion.php.php");
include_once("../datos/dt_denominacion.php.php");

$denom = new Tbl_Denominacion();
$denominacion = new Dt_denominacion();

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $denom->__SET('id_Denominacion',$_POST['id_Denominacion']);
                $denom->__SET('idMoneda',$_POST['idMoneda']);
                $denom->__SET('valor',$_POST['valor']);
                $denom->__SET('valor_letras',$_POST['valor_letras']);
                $denom->__SET('estado','1');

                $denominacion->regDenominacion($denom);
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
                $denom->__SET('id_Denominacion',$_POST['id_Denominacion']);
                $denom->__SET('idMoneda',$_POST['idMoneda']);
                $denom->__SET('valor',$_POST['valor']);
                $denom->__SET('valor_letras',$_POST['valor_letras']);
                $denom->__SET('estado','2');

                $denominacion->regDenominacion($denom);
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