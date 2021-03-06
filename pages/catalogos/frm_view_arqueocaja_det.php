<?php
//error_reporting(0);

include '../../datos/dt_arqueocaja_det.php';
include '../../entidades/arqueocaja_det.php';
include '../../entidades/vw_arqueocaja_det_moneda_denom.php';

$dtAcd = new Dt_Arqueocaja_Det();
$acd = new Arqueocaja_Det();
$varIdAcd = 0;
if(isset($varIdAcd)) {
    $varIdAcd = $_GET['viewACD'];
}

$acd = $dtAcd->obtenerVwArqueoCajaDet($varIdAcd);
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
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  color: #212529;
}
.dropdown-content a {
  color: #212529;
  padding: 12px 16px;
  text-decoration: none;
  display: content-box;
}

.dropdown-content a:hover {background-color: #495057;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #494E53;}
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
                Denominaci??n
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
            <h1>Arqueocaja Detalle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Arqueocaja Detalle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Arqueocaja Det</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="../../negocio/ng_Arqueocaja_Det.php">
                <div class="card-body">
                 <div class="form-group">
                    <label>ID Arqueo Caja Detalle</label>
                    <input readonly type="number" value="<?php echo $acd->_GET('idArqueoCaja_Det'); ?>" class="form-control" id="idArqueoCaja_Det" name="idArqueoCaja_Det" placeholder="ID ArqueoCaja Det">
                  </div>
                  <div class="form-group">
                    <label>ID Arqueo Caja</label>
                    <input readonly type="number" value="<?php echo $acd->_GET('id_ArqueoCaja'); ?>" class="form-control" id="id_ArqueoCaja" name="id_ArqueoCaja"placeholder="ID Arqueo Caja">
                  </div>
                  <div class="form-group">
                    <label>Simbolo</label>
                    <input readonly type="text" value="<?php echo $acd->_GET('simbolo'); ?>" class="form-control" id="simbolo" name="simbolo"placeholder="Simbolo">
                  </div>
                  <div class="form-group">
                    <label>Moneda</label>
                    <input readonly type="text" value="<?php echo $acd->_GET('moneda'); ?>" class="form-control" id="moneda" name="moneda"placeholder="Moneda">
                  </div>
                  <div class="form-group">
                    <label>Denominacion</label>
                    <input readonly type="number" value="<?php echo $acd->_GET('denominacion'); ?>" class="form-control" id="denominacion" name="denominacion" placeholder="Denominacion">
                  </div>
                  <div class="form-group">
                    <label>Cantidad</label>
                    <input readonly type="number" value="<?php echo $acd->_GET('cantidad'); ?>" class="form-control" id="cantidad" name="cantidad"placeholder="Cantidad">
                  </div>
                  <div class="form-group">
                    <label>Subtotal</label>
                    <input readonly type="number" value="<?php echo $acd->_GET('subtotal'); ?>" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

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
      function setValoresArqueoCajaDet() {
      $("#idArqueoCaja_Det").val("<?php echo $acd->_GET('idArqueoCaja_Det') ?>")
      $("#id_ArqueoCaja").val("<?php echo $acd->_GET('id_ArqueoCaja') ?>")
      $("#simbolo").val("<?php echo $acd->_GET('simbolo') ?>")
      $("#moneda").val("<?php echo $acd->_GET('moneda') ?>")
      $("#denominacion").val("<?php echo $acd->_GET('denominacion') ?>")
      $("#cantidad").val("<?php echo $acd->_GET('cantidad') ?>")
      $("#subtotal").val("<?php echo $acd->_GET('subtotal') ?>")

    }
    $(document).ready(function() {
          setValoresArqueoCajaDet();
        });
  </script>
</body>
</html>