<?php

include_once("../entidades/tbl_control_bonos.php");
include_once("../datos/dt_control_bonos.php");

$bono = new Tbl_Control_Bonos();
$dtBono = new Dt_Control_Bonos();

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $bono->__SET('id_bono', $_POST['id_bono']);
                $bono->__SET('nombre', $_POST['nombre']);
                $bono->__SET('valor', $_POST['valor']);
                $bono->__SET('estado', '1');

                $dtBono->regBono($bono);
                header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=2");
            }
            break;

        case '2':
            try
            {
                $bono->__SET('id_bono',$_POST['id_bono']);
                $bono->__SET('nombre', $_POST['nombre']);
                $bono->__SET('valor', $_POST['valor']);
                $bono->__SET('estado', '2');


                $dtBono->editBono($bono);
                header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=4");
                die($e->getMessage());
            }
            break;
            default:
            #code...
            break;

    }
}

if ($_GET)
            {
                try
                {
                    $bono->__SET('id_bono', $_GET['delB']);
                    $dtBono->deleteBono($bono->__GET('id_bono'));
                    header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=5");
            
                }
                catch(Exception $e)
                {
                    header("Location: ../pages/catalogos/tbl_control_bonos.php?msj=6");
                    die($e->getMessage());
                }
            }