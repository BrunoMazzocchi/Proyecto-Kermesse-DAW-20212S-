<?php

include_once("../entidades/productos.php");
include_once("../datos/dt_productos.php");

$p = new Productos();
$dtp = new Dt_Productos();


if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion)
    {

        case '1':
            try
            {
                $p->__SET('id_producto', $_POST['id_producto']);
                $p->__SET('id_comunidad', $_POST['id_comunidad']);
                $p->__SET('id_categoria_producto', $_POST['id_categoria_producto']);
                $p->__SET('nombre', $_POST['nombre']);
                $p->__SET('descripcion', $_POST['descripcion']);
                $p->__SET('cantidad', $_POST['cantidad']);
                $p->__SET('preciov_sugerido', $_POST['preciov_sugerido']);
                $p->__SET('estado', 1);


                $dtp->regProducto($p);
                header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=1");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=2");
              
            }
            break;
            case '2':
                try {
                $p->__SET('id_producto', $_POST['id_producto']);
                $p->__SET('id_comunidad', $_POST['id_comunidad']);
                $p->__SET('id_categoria_producto', $_POST['id_categoria_producto']);
                $p->__SET('nombre', $_POST['nombre']);
                $p->__SET('descripcion', $_POST['descripcion']);
                $p->__SET('cantidad', $_POST['cantidad']);
                $p->__SET('preciov_sugerido', $_POST['preciov_sugerido']);
                $p->__SET('estado', 2);

    
                    
                    $dtp->editProducto($p);
                    header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=4");
            }
           break;
        }
    }
    
    if ($_GET) {
        try {
            $p->__SET('id_producto', $_GET['delP']);
            $dtp->deleteProducto($p->__GET('id_producto'));
    
            header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=5");
        }
        catch (Exception $e)
        {
            header("Location: /AdminLTE/pages/catalogos/tbl_productos.php?msj=6");
            
        }
    }

    
    