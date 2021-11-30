<?php

include_once("../entidades/comunidad.php");
include_once("../datos/dt_comunidad.php");

$cmn = new Comunidad();
$dtCmn = new Dt_comunidad();

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $cmn->__SET('id_comunidad', $_POST['id_comunidad']);
                $cmn->__SET('nombre', $_POST['nombre']);
                $cmn->__SET('responsable', $_POST['responsable']);
                $cmn->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $cmn->__SET('estado', 1);


                $dtCmn->regComunidad($cmn);
                header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=2");
              
            }
            break;
            case '2':
                try {
                    $cmn->__SET('id_comunidad', $_POST['id_comunidad']);
                    $cmn->__SET('nombre', $_POST['nombre']);
                    $cmn->__SET('responsable', $_POST['responsable']);
                    $cmn->__SET('desc_contribucion', $_POST['desc_contribucion']);
                    $cmn->__SET('estado', 2);
    
                    
                    $dtCmn->editComunidad($cmn);
                    header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=4");
            }
           break;
        }
    }
    
    if ($_GET) {
        try {
            $cmn->__SET('id_comunidad', $_GET['delC']);
            $dtCmn->deleteComunidad($cmn->__GET('id_comunidad'));
    
            header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=5");
        }
        catch (Exception $e)
        {
            header("Location: /AdminLTE/pages/catalogos/tbl_comunidad.php?msj=6");
            die($e->getMessage());
            
        }
    }

    
    