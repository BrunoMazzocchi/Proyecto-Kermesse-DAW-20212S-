<?php
error_reporting(0);

include '../../entidades/listaprecio_det.php';
include '../../datos/dt_listaprecio_det.php';
include '../../entidades/lista_precio.php';
include '../../entidades/productos.php';
include '../../datos/dt_listaprecio.php';
include '../../datos/dt_productos.php';

$dtLista = new Dt_ListaPrecio();
$dtProd = new Dt_Productos();
$dtlist = new Dt_ListaPrecioDet();
$list = new Lista_Precio_Det();
$varIdLista = 0;
if (isset($varIdLista)) {
  $varIdLista = $_GET['editC'];
}

$lista = $dtlist->obtenerLista($varIdLista);
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
              <h1>Lista Precio Det</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Editar Lista Precio Det</li>
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
                  <h3 class="card-title">Editar Lista Precio Det</h3>
                </div>
                <form method="POST" action="../../negocio/ng_ListaPrecioDet.php">
                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                      <label>Lista Precio ID</label>
                      <input readonly type="number" class="form-control" id="id_listaprecio_det" name="id_listaprecio_det" placeholder="Lista precio ID" required>
                    </div>
                    <div class="form-group">
                      <label>Seleccione una lista precio</label>
                      <select id="id_lista_precio" name="id_lista_precio" class="form-control">
                        <option value="">Seleccione...</option>


                        <?php

                        foreach ($dtLista->listListaPrecio() as $r) :
                        ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_lista_precio'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php
                        endforeach;

                        ?>


                      </select>

                    </div>
                    <div class="form-group">
                      <label>Seleccione un producto</label>
                      <select id="id_producto" name="id_producto" class="form-control">
                        <option value="">Seleccione...</option>


                        <?php

                        foreach ($dtProd->listProductos() as $r) :
                        ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_producto'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php
                        endforeach;

                        ?>


                      </select>

                    </div>
                    <div class="form-group">
                      <label>Precio Venta</label>
                      <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio Venta" required>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Editar</button>
                      <button type="reset" class="btn btn-danger">Cancelar</button>
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
    function setValoresLista() {
      $("#id_listaprecio_det").val("<?php echo $lista->__GET('id_listaprecio_det') ?>")
      $("#id_lista_precio").val("<?php echo $lista->__GET('id_lista_precio') ?>")
      $("#id_producto").val("<?php echo $lista->__GET('id_producto') ?>")
      $("#precio_venta").val("<?php echo $lista->__GET('precio_venta') ?>")
    }
    $(document).ready(function() {
      setValoresLista();
    });
  </script>
</body>

</html>