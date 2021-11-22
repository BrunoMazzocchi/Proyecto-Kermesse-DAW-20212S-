1<?php

include_once("../entidades/tbl_moneda.php");
include_once("../datos/dt_moneda.php");

$mon = new Tbl_Moneda();
$dtMon = new Dt_moneda();

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $mon->_SET('id_moneda', $_POST['id_moneda']);
                $mon->_SET('nombre', $_POST['nombre']);
                $mon->_SET('simbolo', $_POST['simbolo']);
                $mon->_SET('estado', '1');

                $dtMon->regMoneda($mon);
                header("Location: ../pages/catalogos/tbl_moneda.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_moneda.php?msj=2");
            }
            break;

        case '2':
                try
                {
                    $mon->_SET('id_moneda', $_POST['id_moneda']);
                    $mon->_SET('nombre', $_POST['nombre']);
                    $mon->_SET('simbolo', $_POST['simbolo']);
                    $mon->_SET('estado', '2');

                    $dtMon->regMoneda($mon);
                    header("Location: ../pages/catalogos/tbl_moneda.php?msj=3");
                }
                catch (Exception $e)
                {
                    header("Location: ../pages/catalogos/tbl_moneda.php?msj=4");
                    die($e->getMessage());
                }
                break;
                default;
                #code...
                break;

    }

    
}