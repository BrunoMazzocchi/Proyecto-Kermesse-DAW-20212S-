<?php
//error_reporting(0);

include_once('../entidades/listaprecio_det.php');
include_once('../datos/dt_listaprecio_det.php');


$listaDet = new Lista_Precio_Det();
$dtLista = new Dt_ListaPrecioDet();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $listaDet->__SET('id_listaprecio_det', $_POST['id_listaprecio_det']);
                $listaDet->__SET('id_lista_precio', $_POST['id_lista_precio']);
                $listaDet->__SET('id_producto', $_POST['id_producto']);
                $listaDet->__SET('precio_venta', $_POST['precio_venta']);

                $dtLista->regListaPrecioDet($listaDet);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_listaprecio.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_listaprecio.php?msj=2 ");
            }
            break;
        case '2':
            try {
                $listaDet->__SET('id_listaprecio_det', $_POST['id_listaprecio_det']);
                $listaDet->__SET('id_lista_precio', $_POST['id_lista_precio']);
                $listaDet->__SET('id_producto', $_POST['id_producto']);
                $listaDet->__SET('precio_venta', $_POST['precio_venta']);
                $dtLista->editListaPrecioDet($listaDet);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_listaprecio.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_listaprecio.php?msj=4 ");
            }
            break;
    }
}
