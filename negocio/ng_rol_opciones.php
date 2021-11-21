<?php

include_once("../entidades/rol_opciones.php");
include_once("../datos/dt_rol_opciones.php");

$rolOp = new Rol_opciones();
$dtRolOp = new Dt_rol_opciones();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $rolOp->_SET('id_rol_opciones',$_POST['id_rol_opciones']);
                $rolOp->_SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $rolOp->_SET('tbl_opciones_id_opciones', $_POST['tbl_opciones_id_opciones']);

                $dtRolOp->RegistrarRolOpc($rolOp);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol_opciones.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol_opciones.php?msj=2");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}