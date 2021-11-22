<?php


error_reporting(0);

include '../../datos/dt_gastos.php';
include '../../entidades/gastos.php';
include '../../datos/dt_categoria_gastos.php';
include '../../entidades/categoria_gastos.php';

$dtg = new Dt_gastos();
$dtcg = new Dt_categoria_gastos();
$gts = new Tbl_Gastos();

$varIdG = 0;
if(isset($varIdG))
{
    $varIdG = $_GET['editG'];
}
$gts = $dtg->obtenerGasto($varIdG);
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
            <h1>Gastos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gastos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Gasto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label>Fecha Gasto</label>
                    <input type="date" class="form-control" id="fechaGasto" name = "fechaGasto"placeholder="Ingrese la fecha" disabled>
                  </div>
                  <div class="form-group">
                    <label>Concepto</label>
                    <input type="text" class="form-control" id="concepto" name = "concepto"placeholder="Concepto"disabled>
                  </div>
                  <div class="form-group">
                    <label>Monto</label>
                    <input type="number" class="form-control" id="monto" placeholder="Monto"disabled>
                  </div>
                  <div class="form-group">
                    <label>Fecha Creacion</label>
                    <input type="date" class="form-control" id="fecha_creacion" placeholder="Fecha de creacion"disabled>
                  </div>
                  <div class="form-group">
                    <label>Fecha modificacion</label>
                    <input type="date" class="form-control" id="fecha_modificacion" placeholder="Fecha de modificacion"disabled>
                  </div>
                  <div class="form-group">
                    <label>Fecha eliminacion</label>
                    <input type="date" class="form-control" id="fecha_eliminacion" placeholder="Fecha de eliminacion"disabled>
                  </div>
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="number" class="form-control" id="estado" placeholder="Estado"disabled>
                  </div>
                  <div class="form-group">
                    <label>Categoria de gasto</label>
                    <select name="nombre_categoria" id="id_categoria_gastos" disabled>
                      <option value="">Categoria</option>
                     
                      <?php
                  foreach($dtcg -> ListaCG() as $r):
                  ?>

                  <tr>
                    <option value="<?php echo $r->__GET('id_categoria_gastos');  ?>"><?php echo $r->__GET('nombre_categoria');  ?></option>
                 
                
                  </tr>
                  <?php
                  endforeach;
                  ?>


                    </select>
                  </div>
                </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                <a href="tbl_gastos.php"><i class="far fa fa-undo-alt"></i>Regresar</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});

</script>

<script>
function setg(){

$("#fechaGasto").val("<?php echo $cat-> __GET('fechaGasto')?>");
$("#concepto").val("<?php echo $cat-> __GET('concepto')?>");
$("#monto").val("<?php echo $cat-> __GET('monto')?>");
$("#fecha_creacion").val("<?php echo $cat-> __GET('fecha_creacion')?>");
$("#fecha_modificacion").val("<?php echo $cat-> __GET('fecha_modificacion')?>");
$("#fecha_eliminacion").val("<?php echo $cat-> __GET('fecha_eliminacion')?>");
$("#estado").val("<?php echo $cat-> __GET('estado')?>");
$("#id_categoria_gastos").val("<?php echo $cat-> __GET('nombre_categoria')?>");

}

$(document).ready(function()
{
  setg();
});
</script>

</body>
</html>