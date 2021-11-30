<?php

include_once("../entidades/opciones.php");
include_once("../datos/dt_opciones.php");

$opc = new Opciones();
$dtOpc = new Dt_opciones();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $opc->_SET('id_opciones',$_POST['id_opciones']);
                $opc->_SET('opcion_descripcion',$_POST['opcion_descripcion']);
                $opc->_SET('estado', '1');


                $dtOpc->RegistrarOpc($opc);
                header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=2");
                die($e->getMessage());
            }
            break;
            case '2':
                try
                {
                    $opc->_SET('id_opciones',$_POST['id_opciones']);
                    $opc->_SET('opcion_descripcion',$_POST['opcion_descripcion']);
                    $opc->_SET('estado', '2');
    
    
                    $dtOpc->editOpc($opc);
                    header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=3");
                }
                catch (Exception $e)
                {
                    header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=4");
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
        $opc->_SET('id_opciones', $_GET['delO']);
        $dtOpc->deleteOpc($opc->_GET('id_opciones'));
        header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=5");

    }
    catch(Exception $e)
    {
        header("Location: ../Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_opciones.php?msj=6");
        die($e->getMessage());
    }
}