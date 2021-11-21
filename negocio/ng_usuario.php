<?php

include_once("../entidades/usuario.php");
include_once("../datos/dt_usuario.php");

$us = new Usuario();
$dtUs = new Dt_usuario();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $us->_SET('id_usuario',$_POST['id_usuario']);
                $us->_SET('usuario', $_POST['usuario']);
                $us->_SET('pwd', $_POST['pwd']);
                $us->_SET('nombres', $_POST['nombres']);
                $us->_SET('apellidos', $_POST['apellidos']);
                $us->_SET('email', $_POST['email']);
                $us->_SET('estado', '1');


                $dtUs->RegistrarUsers($us);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_usuario.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_usuario.php?msj=2");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}