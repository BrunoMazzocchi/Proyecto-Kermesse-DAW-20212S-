<?php

include_once("../entidades/tbl_control_bonos.php");
include_once("../datos/dt_control_bonos.php");

$bono = new Tbl_Control_Bonos();
$dtBono = new Dt_Control_Bonos();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $us->_SET('id_bono',$_POST['id_bono']);
                $us->_SET('nombre', $_POST['nombre']);
                $us->_SET('valor', $_POST['valor']);
                $us->_SET('estado', '1');


                $dtUs->RegistrarBono($bono);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_control_bonos.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_control_bonos.php?msj=2");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}