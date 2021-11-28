<?php
//error_reporting(0);

include_once('../entidades/categoria_gastos.php');
include_once('../datos/dt_categoria_gastos.php');


$cat = new Categoria_Gastos();
$dtCat = new Dt_categoria_gastos();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $cat->__SET('id_categoria_gastos', $_POST['id_categoria_gastos']);
                $cat->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $cat->__SET('descripcion', $_POST['descripcion']);
                $cat->__SET('estado', 1);

                $dtCat->regCategoriaGastos($cat);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=2 ");
            }
            break;
        case '2':
            try {                
                $cat->__SET('id_categoria_gastos', $_POST['id_categoria_gastos']);
                $cat->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $cat->__SET('descripcion', $_POST['descripcion']);
                $cat->__SET('estado', 2);
                $dtCat->editarCategoriaGastos($cat);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=4 ");
            }
            break;
    }
}
if ($_GET) {
    try {
        $cat->__SET('id_categoria_gastos', $_GET['delC']);


        $dtCat->deleteCat($cat->__GET('id_categoria_gastos'));
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_categoria_gastos.php?msj=6");
        die($e->getMessage());
    }
}