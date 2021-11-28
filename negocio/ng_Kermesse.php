<?php
//error_reporting(0);

include_once('../entidades/kermesse.php');
include_once('../datos/dt_kermesse.php');


$kerme = new Kermesse();
$dtKerme = new Dt_Kermesse();
date_default_timezone_set("America/Managua");

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
                $kerme->__SET('estado', 1);
                $kerme->__SET('usuario_creacion', 1);
                $kerme->__SET('fecha_creacion', date("Y-m-d H:i:s"));




                $dtKerme->regKermesse($kerme);
                header("Location: ../pages/catalogos/tbl_kermesse.php?msj=1");
            } catch (Exception $e) {
                header("Location: ../pages/catalogos/tbl_kermesse.php?msj=2 ");
            }
            break;
        case '2':
            try {
                $kerme->__SET('id_kermesse', $_POST['id_kermesse']);
                $kerme->__SET('idParroquia', $_POST['idParroquia']);
                $kerme->__SET('nombre', $_POST['nombre']);
                $kerme->__SET('fInicio', $_POST['fInicio']);
                $kerme->__SET('fFinal', $_POST['fFinal']);
                $kerme->__SET('descripcion', $_POST['descripcion']);
                $kerme->__SET('estado', 2);
                $kerme->__SET('usuario_modificacion', 1);
                $kerme->__SET('fecha_modificacion', date("Y-m-d H:i:s"));
                
                $dtKerme->editKerme($kerme);
                header("Location: ../pages/catalogos/tbl_kermesse.php?msj=3");
            } catch (Exception $e) {
                header("Location: ../pages/catalogos/tbl_kermesse.php?msj=4 ");
            }
            break;
    }
}

if ($_GET) {
    try {
        $kerme->__SET('id_kermesse', $_GET['delK']);
        $kerme->__SET('usuario_eliminacion', $_POST['1']);
        $kerme->__SET('fecha_eliminacion', date("Y-m-d H:i:s"));

        $dtKerme->deleteKermesse($kerme->__GET('id_lista_precio'));
        header("Location: ../pages/catalogos/tbl_kermesse.php?msj=5");
    } catch (Exception $e) {
        header("Location: ../pages/catalogos/tbl_kermesse.php?msj=6");
        die($e->getMessage());
    }
}