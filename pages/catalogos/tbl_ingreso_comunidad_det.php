<?php
error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/ingreso_comunidad_det.php';
include '../../datos/dt_ingreso_comunidad_det.php';

$dticd = new Dt_Ingreso_Comunidad_Det();

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
            <a href="../catalogos/tbl_comunidad.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Comunidad
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../catalogos/tbl_ingreso_comunidad.php" class="nav-link">
            <i class="nav-icon fas fa-piggy-bank"></i>
              <p>
                Ingreso Comunidad
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../catalogos/tbl_ingreso_comunidad_det.php" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Ingreso Comunidad Det
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../pages/catalogos/tbl_productos.php" class="nav-link">
              <i class="nav-icon fas fa-lemon"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../pages/catalogos/tbl_categoria_producto.php" class="nav-link">
              <i class="nav-icon fas fa-bread-slice"></i>
              <p>
                Categoria Productos
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
                            <h1> Ingresos Comunidad Detalle</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tabla Ingreso Comunidad Detalle</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabla Ingreso Comunidad Detalle</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID </th>
                                        <th>Ingreso Comunidad</th>
                                        <th> Bono</th>
                                        <th>Denominacion</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal del Bono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($dticd->listIngresoComunidadDet() as $r):
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $r->__GET('id_ingreso_comunidad_det');?></td>
                                        <td><?php echo $r->__GET('id_ingreso_comunidad');?></td>
                                        <td><?php echo $r->__GET('id_bono');?></td>
                                        <td><?php echo $r->__GET('denominaci??n');?></td>
                                        <td><?php echo $r->__GET('cantidad');?></td>
                                        <td><?php echo $r->__GET('subtotal_bono');?></td>

                                        <td> <a href="frm_editar_ingreso_comunidad_det.php?editIDP=<?php echo $r->__GET('id_ingreso_comunidad_det'); ?>" target="blank">
                                            <i class="far fa-edit" title="Editar Ingresos Comunidad Det"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="frm_view_ingreso_comunidad_det.php?viewIDP=<?php echo $r->__GET('id_ingreso_comunidad_det'); ?>" target="blank">
                                            <i class="far fa-eye" title="Ver Ingreso Comunidad Det"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="../../negocio/ng_ingreso_comunidad_det.php?delICD=<?php echo $r->__GET('id_ingreso_comunidad_det') ?>" target="_blank">
                                            <i class="far fa-trash-alt" title="Eliminar"></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <?php
                                    endforeach; 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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

        <script src="../../plugins/DT/datatables.min.js"></script>
        <script src="../../plugins/DT/Responsive-2.2.9/js/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/DT/Responsive-2.2.9/js/responsive.dataTables.min.js"></script>
        <script src="../../plugins/DT/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/DT/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.bootstrap4.min.js"></script>
        <script src="../../plugins/DT/JSZip-2.5.0/jszip.min.js"></script>
        <script src="../../plugins/DT/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="../../plugins/DT/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.html5.min.js"></script>
        <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.print.min.js"></script>
        <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.colVis.min.js"></script>


        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- Page specific script -->
         <script>
    function deleteIngresoComunidadDet(id) {
      confirm(function(e, btn) {
          e.preventDefault();
          window.location.href = "../../negocio/ng_ingreso_comunidad.php?delIC" + id;
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