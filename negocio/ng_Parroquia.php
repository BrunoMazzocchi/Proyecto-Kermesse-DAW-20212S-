<?php
//error_reporting(0);

include_once('../entidades/parroquia.php');
include_once('../datos/dt_parroquia.php');


$parro = new Parroquia();
$dtParro = new Dt_Parroquia();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $parro->__SET('idParroquia', $_POST['idParroquia']);
                $parro->__SET('nombre', $_POST['nombre']);
                $parro->__SET('direccion', $_POST['direccion']);
                $parro->__SET('telefono', $_POST['telefono']);
                $parro->__SET('parroco', $_POST['parroco']);
                $parro->__SET('logo', $_POST['logo']);
                $parro->__SET('sitio_web', $_POST['sitio_web']);

                $dtParro->regParroquia($parro);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_parroquia.php?msj=2 ");
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
