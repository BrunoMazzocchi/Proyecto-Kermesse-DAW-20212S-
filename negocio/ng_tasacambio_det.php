<?php

include_once("../entidades/tasacambio_det.php");
include_once("../datos/dt_tasacambio_det.php");

$tasacDet = new Tasacambio_Det();
$dtTasaCDet = new Dt_tasacambio_det();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $tasacDet->_SET('id_tasaCambio', $_POST['id_tasaCambio']);
                $tasacDet->_SET('fecha', $_POST['fecha']);
                $tasacDet->_SET('tipoCambio', $_POST['tipoCambio']);

                $dtTasaCDet->RegistarTasaCambioDet($tasacDet);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=2");
                die($e->getMessage());
            }
            break;
        case '2':
            try
            {
                $tasacDet->_SET('id_tasaCambio_det', $_POST['id_tasaCambio_det']);
                $tasacDet->_SET('id_tasaCambio', $_POST['id_tasaCambio']);
                $tasacDet->_SET('fecha', $_POST['fecha']);
                $tasacDet->_SET('tipoCambio', $_POST['tipoCambio']);

                $dtTasaCDet->editTasaCambioDet($tasacDet);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=4");
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
        $tasacDet->_SET('id_tasaCambio_det', $_GET['delTCD']);
        $dtTasaCDet->deleteTasaCambioDet($tasacDet->_GET('id_tasaCambio_det'));
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=5");

    }
    catch(Exception $e)
    {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=6");
        die($e->getMessage());
    }
}