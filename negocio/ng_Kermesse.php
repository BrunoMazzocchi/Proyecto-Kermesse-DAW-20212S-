<?php
//error_reporting(0);

include_once('../entidades/kermesse.php');
include_once('../datos/dt_kermesse.php');


$kerme = new Kermesse();
$dtKerme = new Dt_Kermesse();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $kerme->__SET('id_kermesse', $_POST['id_kermesse']);
                $kerme->__SET('idParroquia', $_POST['idParroquia']);
                $kerme->__SET('nombre', $_POST['nombre']);
                $kerme->__SET('fInicio', $_POST['fInicio']);
                $kerme->__SET('fFinal', $_POST['fFinal']);
                $kerme->__SET('descripcion', $_POST['descripcion']);
                $kerme->__SET('fFinal', $_POST['fFinal']);
                $kerme->__SET('estado', $_POST['estado']);


                $dtKerme->regKermesse($kerme);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_kermesse.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_kermesse.php?msj=2 ");
            }
            break;
        case '2':
            try {
                $parro->__SET('idParroquia', $_POST['idParroquia']);
                $parro->__SET('nombre', $_POST['nombre']);
                $parro->__SET('direccion', $_POST['direccion']);
                $parro->__SET('telefono', $_POST['telefono']);
                $parro->__SET('parroco', $_POST['parroco']);
                $parro->__SET('logo', $_POST['logo']);
                $parro->__SET('sitio_web', $_POST['sitio_web']);

                $dtParro->editParro($parro);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=4 ");
            }
            break;
    }
}

if ($_GET) {
    try {
        $parro->__SET('idParroquia', $_GET['delC']);
        $dtParro->deleteParroquia($parro->__GET('idParroquia'));

        header("Location:  /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=6 ");
    }
}
