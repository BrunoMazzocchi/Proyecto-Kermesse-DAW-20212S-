<?php

include_once("../entidades/ingreso_comunidad_det.php");
include_once("../datos/dt_ingreso_comunidad_det.php");

$icd = new Ingreso_Comunidad_Det();
$dticd = new Dt_Ingreso_Comunidad_Det();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $icd->__SET('id_ingreso_comunidad_det', $_POST['id_ingreso_comunidad_det']);
                $icd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                $icd->__SET('id_bono', $_POST['id_bono']);
                $icd->__SET('denominacion', $_POST['denominacion']);
                $icd->__SET('cantidad', $_POST['cantidad']);
                $icd->__SET('subtotal_bono', $_POST['subtotal_bono']);
  


                $dtic->regIngresoComunidadDet($icd);
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=2");
              
            }
            break;
            case '2':
                try {
                    $icd->__SET('id_ingreso_comunidad_det', $_POST['id_ingreso_comunidad_det']);
                    $icd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                    $icd->__SET('id_bono', $_POST['id_bono']);
                    $icd->__SET('denominacion', $_POST['denominacion']);
                    $icd->__SET('cantidad', $_POST['cantidad']);
                    $icd->__SET('subtotal_bono', $_POST['subtotal_bono']);
    
                    
                    $dtic->editIngresoComunidadDet($icd);
                    header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=4");
            }
           break;
        }
    }
    
    if ($_GET) {
        try {
            $ic->__SET('id_ingreso_comunidad_det', $_GET['delICD']);
            $dtic->deleteIngresoComunidadDet($icd->__GET('id_ingreso_comunidad_det'));
    
            header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=5");
        }
        catch (Exception $e)
        {
            header("Location: /AdminLTE/pages/catalogos/tbl_ingreso_comunidad_det.php?msj=6");
            die($e->getMessage());
            
        }
    }

    
    
