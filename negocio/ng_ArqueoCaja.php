<?php

include_once("../entidades/arqueocaja.php");
include_once("../datos/dt_arqueocaja.php");

$ac = new Arqueocaja();
$dtAc = new Dt_Arqueocaja();

if ($_POST){
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion)
    {
        case '1':
            try{
                $ac->_SET('id_ArqueoCaja', $_POST['id_ArqueoCaja']);
                $ac->_SET('idKermesse', $_POST['idKermesse']);
                $ac->_SET('fechaArqueo', $_POST['fechaArqueo']);
                $ac->_SET('granTotal', $_POST['granTotal']);
                $ac->_SET('usuario_creacion', $_POST['usuario_creacion']);
                $ac->_SET('fecha_creacion', $_POST['fecha_creacion']);
                $ac->_SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $ac->_SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $ac->_SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $ac->_SET('fecha_eliminacion', $_POST['fecha_eliminacion']);
                $ac->_SET('estado', '1');

                $dtAc->regArqueoCaja($ac);
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=2");
            }
            break;

        case '2':
            try
            {
                $ac->_SET('id_ArqueoCaja', $_POST['id_ArqueoCaja']);
                $ac->_SET('idKermesse', $_POST['idKermesse']);
                $ac->_SET('fechaArqueo', $_POST['fechaArqueo']);
                $ac->_SET('granTotal', $_POST['granTotal']);
                $ac->_SET('usuario_creacion', $_POST['usuario_creacion']);
                $ac->_SET('fecha_creacion', $_POST['fecha_creacion']);
                $ac->_SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $ac->_SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $ac->_SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $ac->_SET('fecha_eliminacion', $_POST['fecha_eliminacion']);
                $ac->_SET('estado', '2');

                $dtBono->editBono($bono);
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=4");
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
                    $ac->_SET('id_ArqueoCaja', $_GET['delAC']);
                    $dtAc->deleteArqueoCaja($ac->_GET('id_ArqueoCaja'));
                    header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=5");
            
                }
                catch(Exception $e)
                {
                    header("Location: ../pages/catalogos/tbl_arqueocaja.php?msj=6");
                    die($e->getMessage());
                }
            }