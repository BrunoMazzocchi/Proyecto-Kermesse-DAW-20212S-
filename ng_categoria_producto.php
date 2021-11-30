<?php
//error_reporting(0);

include_once('../entidades/categoria_producto.php');
include_once('../datos/dt_categoria_producto.php');


$cpt = new Categoria_Producto();
$dtCpt = new Dt_Categoria_Producto();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $cpt->__SET('id_categoria_producto', $_POST['id_categoria_producto']);
                $cpt->__SET('nombre', $_POST['nombre']);
                $cpt->__SET('descripcion', $_POST['descripcion']);
                $cpt->__SET('estado', 1);

                $dtCpt->regCategoriaProducto($cpt);
                header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=1");
            } catch (Exception $e) {
                header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=2 ");
            }
            break;
        case '2':
            try {
                $cpt->__SET('id_categoria_producto', $_POST['id_categoria_producto']);
                $cpt->__SET('nombre', $_POST['nombre']);
                $cpt->__SET('descripcion', $_POST['descripcion']);
                $cpt->__SET('estado', 2);
                $dtCpt->editCategoria($cpt);
                header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=3");
            } catch (Exception $e) {
                header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=4 ");
            }
            break;
    }
}

if ($_GET) {
    try {
        $cpt->__SET('id_categoria_producto', $_GET['delCP']);
        $dtCpt->deleteCategoria($cpt->__GET('id_categoria_producto'));

        header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=5");
    } catch (Exception $e) {
        header("Location: /AdminLTE/pages/catalogos/tbl_categoria_producto.php?msj=6 ");
        die($e->getMessage());
    }
}
