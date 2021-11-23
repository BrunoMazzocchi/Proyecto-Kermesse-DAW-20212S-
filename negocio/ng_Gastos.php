<?php
//error_reporting(0);

include_once('../entidades/gastos.php');
include_once('../datos/dt_gastos.php');


$gt = new Gastos();
$dtGast = new Dt_gastos();
date_default_timezone_set("America/Managua");

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $lista->__SET('id_registro_gastos', $_POST['id_registro_gastos']);
                $lista->__SET('idKermesse', $_POST['idKermesse']);
                $lista->__SET('idCatGastos', $_POST['idCatGastos']);
                $lista->__SET('fechaGasto', $_POST['fechaGasto']);
                $lista->__SET('concepto', $_POST['concepto']);
                $lista->__SET('monto', $_POST['monto']);
                $lista->__SET('usuario_creacion', 1);
                $lista->__SET('fecha_creacion', date("Y-m-d H:i:s"));
                $lista->__SET('estado', 1);


                $dtGast->regGastos($gt);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=2 ");
            }
            break;
        case '2':
            try {                
                $lista->__SET('id_registro_gastos', $_POST['id_registro_gastos']);
                $lista->__SET('idKermesse', $_POST['idKermesse']);
                $lista->__SET('idCatGastos', $_POST['idCatGastos']);
                $lista->__SET('fechaGasto', $_POST['fechaGasto']);
                $lista->__SET('concepto', $_POST['concepto']);
                $lista->__SET('monto', $_POST['monto']);
                $lista->__SET('usuario_modificacion', 1);
                $lista->__SET('fecha_modificacion', date("Y-m-d H:i:s"));
                $lista->__SET('estado', 2);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=4 ");
            }
            break;
    }
}

if ($_GET) {
    try {
        $gt->__SET('id_lista_precio', $_GET['delC']);
        $dtGast->deleteGastos($lista->__GET('id_lista_precio'));

        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_gastos.php?msj=6 ");
    }
}
