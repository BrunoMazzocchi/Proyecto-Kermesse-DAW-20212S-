<?php

include_once("../entidades/rol.php");
include_once("../datos/dt_rol.php");

$rol = new Rol();
$dtRol = new Dt_rol();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $rol->_SET('id_rol',$_POST['id_rol']);
                $rol->_SET('rol_descripcion',$_POST['rol_descripcion']);
                $rol->_SET('estado', '1');


                $dtRol->RegistrarRol($rol);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=2");
                die($e->getMessage());
            }
            break;
            
        case '2':
            try
            {
                $rol->_SET('id_rol',$_POST['id_rol']);
                $rol->_SET('rol_descripcion',$_POST['rol_descripcion']);
                $rol->_SET('estado', '2');


                $dtRol->editRol($rol);
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=4");
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
        $rol->_SET('id_rol', $_GET['delR']);
        $dtRol->deleteRol($rol->_GET('id_rol'));
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=5");

    }
    catch(Exception $e)
    {
        header("Location: /Proyecto-Kermesse-DAW-20212S-/pages/catalogos/tbl_rol.php?msj=6");
        die($e->getMessage());
    }
}