<?php

include_once("../entidades/ingreso_comunidad.php");
include_once("../datos/dt_ingreso_comunidad.php");

$ic = new Ingreso_Comunidad();
$dtic = new Dt_Ingreso_Comunidad();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $ic->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                $ic->__SET('id_kermesse', $_POST['id_kermesse']);
                $ic->__SET('id_comunidad', $_POST['id_comunidad']);
                $ic->__SET('id_producto', $_POST['id_producto']);
                $ic->__SET('cant_productos', $_POST['cant_productos']);
                $ic->__SET('total_bonos', $_POST['total_bonos']);
                $ic->__SET('usuario_creacion', 1);
                $ic->__SET('fecha_creacion', date("Y-m-d H:i:s"));


                $dtic->regIngresoComunidad($ic);
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=2");
              
            }
            break;
            case '2':
                try {
                    $ic->__SET('id_kermesse', $_POST['id_kermesse']);
                    $ic->__SET('id_comunidad', $_POST['id_comunidad']);
                    $ic->__SET('id_producto', $_POST['id_producto']);
                    $ic->__SET('cant_productos', $_POST['cant_productos']);
                    $ic->__SET('total_bonos', $_POST['total_bonos']);
                    $ic->__SET('usuario_modificacion', 1);
                    $ic->__SET('fecha_modificacion', date("Y-m-d H:i:s"));
                    $ic->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
    
                    
                    $dtic->editIngresoComunidad($ic);
                    header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=4");
            }
           break;
        }
    }
    
    if ($_GET) {
        try {
            $ic->__SET('id_ingreso_comunidad', $_GET['delIC']);
            $dtic->deleteIngresoComunidad($ic->__GET('id_ingreso_comunidad'));
    
            header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=5");
        }
        catch (Exception $e)
        {
            header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad.php?msj=6");
            die($e->getMessage());
            
        }
    }

    
    