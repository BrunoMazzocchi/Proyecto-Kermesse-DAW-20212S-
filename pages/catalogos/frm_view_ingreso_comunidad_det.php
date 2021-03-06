<?php
error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS
include '../../entidades/ingreso_comunidad_det.php';
include '../../datos/dt_ingreso_comunidad_det.php';


$dticd = new Dt_Ingreso_Comunidad_Det();
$icd = new Ingreso_Comunidad_Det();

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
                            <h1> Ver Ingreso Comunidad Detalle</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Lista Ingreso Comunidad Detalle</li>
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
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ingreso Comunidad Detalle</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                <div class="card-body">
                 
                  
                <div class="form-group">
                    <label>Ingreso Comunidad</label>
                    <input readonly type="text" class="form-control" id="id_ingreso_comunidad" name= "id_ingreso_comunidad"  maxlenght= "50"
                    placeholder="ID Ingreso Comunidad" required>
                  </div>


                   <div class="form-group">
                    <label>Bono</label>
                    <input readonly type="text" class="form-control" id="id_bono" name= "id_bono" step="any" maxlenght= "50"
                    placeholder="ID Bono"  required>
                  </div>


                  <div class="form-group">
                    <label>Denominacion</label>
                    <input readonly type="text" class="form-control" id="denominacion" name= "denominacion"  maxlenght= "50"
                    placeholder="Denominacion del Ingreso"required>
                  </div>

                  <div class="form-group">
                    <label>Cantidad</label>
                    <input readonly type="number" class="form-control" id="cantidad" name= "cantidad"  maxlenght= "20"
                    placeholder="Cantidad del bono"required>
                  </div>

                  <div class="form-group">
                    <label>Subtotal de Bono</label>
                    <input readonly type="number" class="form-control" id="subtotal_bono" name= "subtotal_bono" step="any" maxlenght= "20"
                    placeholder="Subotal del bono"required>
                  </div>

                  
                </div>
                  
              </div>

                <!-- /.card-body -->

                                            <div class="card-footer">
                                            <a href="tbl_ingreso_comunidad_det.php"><i class="fas fa-arrow-left"></i> Atras</a>

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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        function setValoresIngresoComunidadDet() {
            $("#id_ingreso_comunidad_det").val("<?php echo $icd->__GET('id_ingreso_comunidad_det') ?>")
            $("#id_ingreso_comunidad").val("<?php echo $icd->__GET('id_ingreso_comunidad') ?>")
            $("#id_bono").val("<?php echo $icd->__GET('id_bono') ?>")
            $("#denominacion").val("<?php echo $icd->__GET('denominacion') ?>")
            $("#cantidad").val("<?php echo $icd->__GET('cantidad') ?>")
            $("#subtotal_bono").val("<?php echo $icd->__GET('subtotal_bono') ?>")
        }
        $(document).ready(function() {
            setValoresIngresoComunidadDet();
        });
   
    </script>
</body>

</html>