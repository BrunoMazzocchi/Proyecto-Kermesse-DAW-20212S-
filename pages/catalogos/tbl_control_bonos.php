<?php
error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/tbl_control_bonos.php';
include '../../datos/dt_control_bonos.php';

$dtcb = new Dt_Control_Bonos();

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
          <li class="nav-item">
<<<<<<< HEAD
            <a href="../catalogos/tbl_arqueocaja.php" class="nav-link">
              <i class="nav-icon fas fa-object-group"></i>
              <p>
                ArqueoCaja
=======
            <a href="../catalogos/tbl_rol.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Rol
              </p>
            </a>
          </li>
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
>>>>>>> e861b962f6d6fa4686a8b6d8d82b9db48cd05f37
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
                            <h1>Control de Bonos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Tabla Control de bonos</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabla Control de bonos</h3>
                        </div>
                        <div class="card-body">
                        <div class="form-group col-md-12" style="text-align:right">
                        <a href="frm_control_bonos.php" title="Nuevo Bono" target="blank"><i class="far fa-plus-square"></i>Nuevo Bono</a>
                        </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Bono</th>
                                        <th>Nombre</th>
                                        <th>Valor</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($dtcb->listControlBonos() as $r):
                                          $estado = "";
                                            if ($r->__GET('estado') == 1 || $r->__GET('estado') == 2){
                                          $estado = "Activo";
                                          }
                                          else{
                                          $estado = "Inactivo";
                                          }
                                    ?>
                                    <tr>
                                        <td><?php echo $r->__GET('id_bono');?></td>
                                        <td><?php echo $r->__GET('nombre');?></td>
                                        <td><?php echo $r->__GET('valor');?></td>
                                        <td><?php echo $estado;?></td>
                                        <td> <a href="frm_editar_control_bonos.php?editB=<?php echo $r->__GET('id_bono'); ?>" target="blank">
                                            <i class="fas fa-edit" title="Editar Categoria"></i>Editar</a>
                                        &nbsp;&nbsp;
                                        <a href="frm_view_control_bonos.php?viewB=<?php echo $r->__GET('id_bono'); ?>" target="blank">
                                            <i class="fas fa-eye" title="Ver Bono"></i>Ver</a>
                                        &nbsp;&nbsp;
                                        <a href="#" onclick="deleteBono(<?php echo $r->__GET('id_bono'); ?>)">
                                            <i class="fas fa-trash-alt" title="Eliminar Bono">Eliminar</i>
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
<script src="../../plugins/DataTables1.11.2/datatables.min.css"></script>
<script src="../../plugins/DataTables1.11.2/Responsive-2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Responsive-2.2.9/js/responsive.dataTables.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Buttons-2.0.0/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/DataTables1.11.2/JSZip-2.5.0/jszip.min.js"></script>
<script src="../../plugins/DataTables1.11.2/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="../../plugins/DataTables1.11.2/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="../../plugins/DataTables1.11.2/Buttons-2.0.0/js/buttons.html5.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Buttons-2.0.0/js/buttons.print.min.js"></script>
<script src="../../plugins/DataTables1.11.2/Buttons-2.0.0/js/buttons.colVis.min.js"></script>
<script src="../../plugins/jAlert/dist/jAlert.min.js">//optional!!</script>
<script src="../../plugins/jAlert/dist/jAlert-functions.min.js"></script>


        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- Page specific script -->
        <script>

            function deleteBono(idB)
            {
              confirm(function(e,btn)
              {
                e.preventDefault();
                window.location.href = "../../negocio/ng_Bono.php?delB="+idB;
              },
              function(e,btn)
              {
                e.preventDefault();
              });
            }

        $(document).ready(function() {
            var mensaje = 0;
            mensaje = "<?php echo $varMsj ?>";

            if (mensaje == '1') {
                sucessAlert('Exito', 'Los datos han sido registrados exitosamente!');
            }
            if (mensaje == '3') {
                sucessAlert('Exito', 'Los datos han sido editado exitosamente!');
            }
            if (mensaje == '5') {
                sucessAlert('Exito', 'Los datos han sido eliminado exitosamente!');
            }
            if (mensaje == '2' || mensaje == '4') {
                errorAlert('Error', 'Error', 'Revise los datos e intente nuevamente!');
            }
            if (mensaje == '6') {
                errorAlert ('Error', 'Verifique que exista el dato');
            }


            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
        });
    </script>
</body>

</html>