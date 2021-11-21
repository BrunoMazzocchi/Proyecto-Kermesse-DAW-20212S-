<?php

include_once("../entidades/rol_usuario.php");
include_once("../datos/dt_rol_usuario.php");

$rolU = new Rol_usuario();
$dtRolUs = new Dt_rol_usuario();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $rolU->_SET('id_rol_usuario',$_POST['id_rol_usuario']);
                $rolU->_SET('tbl_usuario_id_usuario', $_POST['tbl_usuario_id_usuario']);
                $rolU->_SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);

                $dtRolUs->RegistrarRolUser($rolU);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol_usuario.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol_usuario.php?msj=2");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}