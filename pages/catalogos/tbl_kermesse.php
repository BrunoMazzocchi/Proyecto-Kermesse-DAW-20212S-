<?php
error_reporting(0);

include '../../entidades/kermesse.php';
include '../../datos/dt_kermesse.php';
include '../../entidades/vw_kermesse_parroquia.php';

$dtKerme = new Dt_Kermesse();

$varMsj = 0;
if (isset($varMsj)) {
    $varMsj = $_GET['msj'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
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
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-marker"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.html" class="brand-link">
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
                            <h1>Tablas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Kermesse</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kermesse</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group col-md-12" style="text-align: right;">
                        <a href="frm_kermesse.php" title="Registrar una nueva kermesse" target="_blank"><i class="far fa-2x fa-plus-square"></i></a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>K ID</th>
                                <th>P ID</th>
                                <th>Nombre</th>
                                <th>Fecha inicio</th>
                                <th>Fecha final</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Usuario Creacion</th>
                                <th>Fecha creacion</th>
                                <th>Usuario modificacion</th>
                                <th>Fecha modificacion</th>
                                <th>Usuario eliminacion</th>
                                <th>Fecha eliminacion</th>

                            </tr>
                        </thead>
                        </thead>

                        <tbody>

                            <?php
                            foreach ($dtKerme->listKermesse() as $r) :
                            ?>
                                <tr>
                                    <td><?php echo $r->__GET('id_kermesse') ?></td>
                                    <td><?php echo $r->__GET('idParroquia') ?></td>
                                    <td><?php echo $r->__GET('nombreKermesse') ?></td>
                                    <td><?php echo $r->__GET('fInicio') ?></td>
                                    <td><?php echo $r->__GET('fFinal') ?></td>
                                    <td><?php echo $r->__GET('descripcion') ?></td>
                                    <td><?php echo $r->__GET('estado') ?></td>
                                    <td><?php echo $r->__GET('usuario_creacion') ?></td>
                                    <td><?php echo $r->__GET('fecha_creacion') ?></td>
                                    <td><?php echo $r->__GET('usuario_modificacion') ?></td>
                                    <td><?php echo $r->__GET('fecha_modificacion') ?></td>
                                    <td><?php echo $r->__GET('usuario_eliminacion') ?></td>
                                    <td><?php echo $r->__GET('fecha_eliminacion') ?></td>

                                    <td> <a href="frm_editar_kermesse.php?editC=<?php echo $r->__GET('id_kermesse'); ?>" target="blank">
                                            <i class="far fa-edit" title="Editar Kermesse"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="frm_view_kermesse.php?viewC=<?php echo $r->__GET('id_kermesse'); ?>" target="blank">
                                            <i class="far fa-eye" title="Ver Kermesse"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="../../negocio/ng_Kermesse.php?delC=<?php echo $r->__GET('id_kermesse') ?>" target="_blank">
                                            <i class="far fa-trash-alt" title="Eliminar"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>

                        <tfoot>
                            <tr>

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

    <!-- jAlert -->
    <script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
    <script src="../../plugins/jAlert/dist/jAlert-functions.min.js">
        //optional!! 
    </script>

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
    <script>
        $(document).ready(function() {
            var mensaje = 0;
            mensaje = "<?php echo $varMsj ?>";
            if (mensaje == "1") {
                successAlert('Exito', 'Los datos han sido registrado exitosamente');
            }
            if (mensaje == "2" || mensaje == '4') {
                errorAlert('Error', 'Revise los datos e intente de nuevo');
            }
            if (mensaje == "3") {
                successAlert('Exito', 'Los datos han sido editado exitosamente');
            }
            if (mensaje == "5") {
                successAlert('Exito', 'Los datos han sido eliminado exitosamente');
            }
            if (mensaje == "6") {
                errorAlert('Error', 'Revise que los datos existan');
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