<?php

include_once("../entidades/tasacambio.php");
include_once("../datos/dt_tasacambio.php");

$tasac = new Tasacambio();
$dtTasaC = new Dt_tasacambio();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $tasac->_SET('id_monedaO', $_POST['id_monedaO']);
                $tasac->_SET('id_monedaC', $_POST['id_monedaC']);
                $tasac->_SET('mes', $_POST['mes']);
                $tasac->_SET('anio', $_POST['anio']);

                $dtTasaC->RegistarTasaCambio($tasac);
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
                $tasac->_SET('id_tasaCambio', $_POST['id_tasaCambio']);
                $tasac->_SET('id_monedaO', $_POST['id_monedaO']);
                $tasac->_SET('id_monedaC', $_POST['id_monedaC']);
                $tasac->_SET('mes', $_POST['mes']);
                $tasac->_SET('anio', $_POST['anio']);

                $dtTasaC->editTasaCambio($tasac);
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
        $tasac->_SET('id_tasaCambio', $_GET['delTC']);
        $dtTasaC->deleteTasaCambio($tasac->_GET('id_tasaCambio'));
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=5");

    }
    catch(Exception $e)
    {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_tasacambio.php?msj=6");
        die($e->getMessage());
    }
}