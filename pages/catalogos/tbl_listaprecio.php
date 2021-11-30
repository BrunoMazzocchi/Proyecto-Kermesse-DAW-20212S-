<?php
error_reporting(0);

include '../../entidades/lista_precio.php';
include '../../datos/dt_listaprecio.php';
include '../../entidades/listaprecio_det.php';
include '../../datos/dt_listaprecio_det.php';



include '../../entidades/usuario.php';
include '../../entidades/rol.php';
include '../../entidades/opciones.php';


include '../../datos/dt_Usuario.php';
include '../../datos/dt_Rol.php';
include '../../datos/dt_Opciones.php';

$dtlistdet = new Dt_ListaPrecioDet();
$dtlist = new Dt_ListaPrecio();

$varMsj = 0;
if (isset($varMsj)) {
  $varMsj = $_GET['msj'];
}


//SEGURIDAD//

$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtr = new Dt_Rol();
$dtOpc = new Dt_Opciones();

//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION

//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) {
  //nos envía al inicio
  header("Location: ../../login.php?msj=2");
}

$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION

//OBTENEMOS EL ROL
$rol->_SET('id_rol', $dtr->getIdRol($usuario[0]->_GET('usuario')));

//OBTENEMOS LAS OPCIONES DEL ROL
$listOpc = $dtOpc->getOpciones($rol->_GET('id_rol'));

//OBTENEMOS LA OPCION ACTUAL
$url = $_SERVER['REQUEST_URI'];
// var_dump($url);
$inicio = strrpos($url, '/') + 1;
// var_dump($inicio); //6
// $total= strlen($url); 
// var_dump($total); //28
$fin = strripos($url, '?');
// var_dump($fin); //22
if ($fin > 0) {
  $miPagina = substr($url, $inicio, $fin - $inicio);
  // var_dump($miPagina);
} else {
  $miPagina = substr($url, $inicio);
  // var_dump($miPagina);
}

////// VALIDAMOS LA OPCIÓN ACTUAL CON LA MATRIZ DE OPCIONES //////
//obtenemos el numero de elementos
$longitud = count($listOpc);
$acceso = false; // VARIABLE DE CONTROL

//Recorro todos los elementos de la matriz de opciones
for ($i = 0; $i < $longitud; $i++) {
  //obtengo el valor de cada elemento
  $opcion = $listOpc[$i]->_GET('opcion_descripcion');
  if (strcmp($miPagina, $opcion) == 0) //COMPARO LA OPCION ACTUAL CON CADA OPCIÓN DE LA MATRIZ
  {
    $acceso = true; //ACCESO CONCEDIDO
    break;
  }
}

if (!$acceso) {
  //ACCESO NO CONCEDIDO 
  header("Location: ../../401.php"); //REDIRECCIONAMOS A LA PAGINA DE ACCESO RESTRINGIDO
}

// 
$dtu = new Dt_Usuario();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    .dropbtn {
      background-color: #343a40;
      color: #C2C7D0;
      padding-left: 20px;
      padding-top: 8px;
      padding-bottom: 8px;
      font-size: 16px;
      border: none;
      text-align: left;
      width: 234px;
      height: 40px;
      border-radius: 3px;

    }

    .dropdown {
      position: relative;
      display: content-box;
    }

    .dropdown-content {
      display: none;
      position: relative;
      background-color: #343a40;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      color: #212529;
    }

    .dropdown-content a {
      color: #212529;
      padding: 12px 16px;
      text-decoration: none;
      display: content-box;
    }

    .dropdown-content a:hover {
      background-color: #495057;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #494E53;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/DataTables1.11.2-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/DataTables1.11.2-/Responsive-2.2.9/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/DataTables1.11.2/Buttons-2.0.0/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/jAlert/dist/jAlert.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../login.php" title="Cerrar Sesion">
            <i class="fas fa-power-off"></i> Cerrar Sesion
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../sistema-kermesse.php" class="brand-link">
        <img src="../../dist/img/Kermesse_Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kermesse</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">TABLAS</li>
            <li class="nav-item">
              <a href="../catalogos/tbl_denominacion.php" class="nav-link">
                <i class="nav-icon fas fa-search-dollar"></i>
                <p>
                  Denominación
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_Moneda.php" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Moneda
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_productos.php" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>
                  Productos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/catalogos/tbl_gastos.php" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Gastos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/catalogos/tbl_categoria_gastos.php" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Categoria Gastos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_listaprecio.php" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Precios
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_parroquia.php" class="nav-link">
                <i class="nav-icon fas fa-church"></i>
                <p>
                  Parroquia
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_kermesse.php" class="nav-link">
                <i class="nav-icon fas fa-map-pin"></i>
                <p>
                  Kermesse
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_control_bonos.php" class="nav-link">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                  Bonos
                </p>
              </a>
            </li>

            <!--Dropdown Arqueocaja -->
            <div class="dropdown">
              <button class="dropbtn"><i class="nav-icon fas fa-cash-register"></i> ArqueoCaja</button>
              <div class="dropdown-content">
                <li class="nav-item">
                  <a href="../catalogos/tbl_arqueocaja.php" class="nav-link">
                    <i class="nav-icon fas fa-object-group"></i>
                    <p>
                      ArqueoCaja
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../catalogos/tbl_arqueocaja_det.php" class="nav-link">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>
                      ArqueoCaja Detalle
                    </p>
                  </a>
                </li>
              </div>
            </div>

            <li class="nav-item">
              <a href="../catalogos/tbl_opciones.php" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                  Opciones
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../catalogos/tbl_usuario.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>

            <!--Dropdown Menu Rol -->
            <div class="dropdown">
              <button class="dropbtn"><i class="nav-icon fas fa-lock"></i> Rol</button>
              <div class="dropdown-content">
                <li class="nav-item">
                  <a href="../catalogos/tbl_rol.php" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                    <p>
                      Rol
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../catalogos/tbl_rol_opciones.php" class="nav-link">
                    <i class="nav-icon fas fa-unlock-alt"></i>
                    <p>
                      Rol-Opcion
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../catalogos/tbl_rol_usuario.php" class="nav-link">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                      Rol-Usuario
                    </p>
                  </a>
                </li>
              </div>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Lista Precio</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listas Precio</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group col-md-12" style="text-align: right;">
            <a href="frm_listaprecio.php" title="Registrar una nueva lista precio" target="_blank"><i class="far fa-2x fa-plus-square"></i></a>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Lista Precio ID</th>
                <th>Kermesse</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>

              </tr>
            </thead>


            <tbody>

              <?php
              foreach ($dtlist->listListaPrecio() as $r) :
                $estado = "";
                if ($r->__GET('estado') == 1 || $r->__GET('estado') == 2) {
                  $estado = "Activo";
                } else {
                  $estado = "Inactivo";
                }
              ?>
                <tr>
                  <td><?php echo $r->__GET('id_lista_precio') ?></td>
                  <td><?php echo $r->__GET('nombreKermesse') ?></td>
                  <td><?php echo $r->__GET('nombre') ?></td>
                  <td><?php echo $r->__GET('descripcion') ?></td>
                  <td><?php echo $estado ?></td>

                  <td> <a href="frm_editar_listaprecio.php?editC=<?php echo $r->__GET('id_lista_precio'); ?>" target="blank">
                      <i class="far fa-edit" title="Editar lista precio"></i></a>
                    &nbsp;&nbsp;
                    <a href="frm_view_listaprecio.php?viewC=<?php echo $r->__GET('id_lista_precio'); ?>" target="blank">
                      <i class="far fa-eye" title="Ver lista precio"></i></a>
                    &nbsp;&nbsp;
                    <a href="#" onclick="deleteLista(<?php echo $r->__GET('id_lista_precio'); ?>);">
                      <i class="far fa-trash-alt" title="Eliminar"></i>
                    </a>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>

            <tfoot>
              <tr>
                <th>Lista Precio ID</th>
                <th>Kermesse</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listas Precio Det</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group col-md-12" style="text-align: right;">
            <a href="frm_listaprecio_det.php" title="Registrar una nueva lista precio" target="_blank"><i class="far fa-2x fa-plus-square"></i></a>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Lista Precio Det</th>
                <th>Lista precio</th>
                <th>Producto</th>
                <th>Precio Venta</th>

              </tr>
            </thead>
            </thead>

            <tbody>

              <?php
              foreach ($dtlistdet->listListaPrecioDet() as $r) :
              ?>
                <tr>
                  <td><?php echo $r->__GET('id_listaprecio_det') ?></td>
                  <td><?php echo $r->__GET('nombreProducto') ?></td>
                  <td><?php echo $r->__GET('nombreListaPrecio') ?></td>
                  <td><?php echo $r->__GET('precio_venta') ?></td>

                  <td> <a href="frm_editar_listaprecio_det.php?editC=<?php echo $r->__GET('id_lista_precio'); ?>" target="blank">
                      <i class="far fa-edit" title="Editar lista precio"></i></a>
                    &nbsp;&nbsp;
                    <a href="frm_view_listaprecio_det.php?viewC=<?php echo $r->__GET('id_lista_precio'); ?>" target="blank">
                      <i class="far fa-eye" title="Ver lista precio"></i></a>
                    &nbsp;&nbsp;
                    <a href="../../negocio/ng_ListaPrecio.php?delC=<?php echo $r->__GET('id_listaprecio_det') ?>" target="_blank">
                      <i class="far fa-trash-alt" title="Eliminar"></i>
                    </a>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>

            <tfoot>
              <tr>
                <th>Lista Precio Det</th>
                <th>Lista precio</th>
                <th>Producto</th>
                <th>Precio Venta</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->

  <!-- jAlert -->
  <script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
  <script src="../../plugins/jAlert/dist/jAlert-functions.min.js">
    //optional!! 
  </script>
  <script>
    function deleteLista(id) {
      confirm(function(e, btn) {
          e.preventDefault();
          window.location.href = "../../negocio/ng_ListaPrecio.php?delL=" + id;
        },
        function(e, btn) {
          e.preventDefault();
        });
    }
    $(document).ready(function() {
      var mensaje = 0;
      mensaje = "<?php echo $varMsj ?>";
      if (mensaje == "1") {
        successAlert('Exito', 'Los datos han sido registrados exitosamente');
      }
      if (mensaje == "2" || mensaje == "4" || mensaje == "6") {
        errorAlert('Error', 'Revise los datos e intente de nuevo');
      }
      if (mensaje == "3") {
        successAlert('Exito', 'Los datos han sido actualizados exitosamente');
      }
      if (mensaje == "5") {
        successAlert('Exito', 'Los datos han sido eliminados exitosamente');
      }


      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["excel", "pdf"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    }); // FIN DOC READY FUN
  </script>

</body>

</html>