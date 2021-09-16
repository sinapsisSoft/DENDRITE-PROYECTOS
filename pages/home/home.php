<?php
session_start();

if (!isset($_SESSION['User'])) {
  header("../../pages/login/login.html");
} else {
  $var_session  = $_SESSION['User'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ST Dendrite</title>
  <!-- css link -->
  <?php include("../../php/viewHtml/cssLink.php") ?>
  <link rel=StyleSheet href="css/home.css" type="text/css">
</head>

<body id="page-top">
  <div class="loadPage" id="loadPage"></div>
  <input type="hidden" id="User_id">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("../../php/viewHtml/slideMenu.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include("../../php/viewHtml/navUser.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-primary text-uppercase mb-1">COTIZACIONES <i class="fas fa-calendar "></i></div>
                      <ul>
                        <li>Crear cotización</li>
                        <li>Pre Cotización</li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>
            </div>-->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-warning text-uppercase mb-1">ADMINISTRACIÓN <i class="fas fa-user-cog"></i></div>
                      <ul>
                        <li><a href="../user/user.php"><span>Usuarios</span></a></li>
                        <li><a href="../customer/customer.php"><span>Clientes</span></a></li>                      
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-warning text-uppercase mb-1">PROYECTOS <i class="fas fa-user-cog"></i></div>
                      <ul>                        
                        <li><a href="."><span>Nuevo Proyecto</span></a></li>                      
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-secondary text-uppercase mb-1">COTIZADOR <i class="fas fa-coins"></i></div>
                      <ul>
                        <li><a href="../user/user.php"><span>Cotizar</span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-info text-uppercase mb-1">SIMULADORES <i class="fas fa-clipboard-list "></i></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">

                          <ul>
                        <li><a class="btn btn-icon-split">Gestión</a></li>
                      </ul>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>-->

            <!-- Pending Requests Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-warning text-uppercase mb-1">CONFIGURACIÓN <i class="fas fa-comments "></i></div>
                      <ul>
                       <li><a class="btn btn-icon-split">Cliente</a></li>
                       <li><a class="btn btn-icon-split">Proveedores</a></li>
                       <li><a class="btn btn-icon-split">Seguridad</a></li>
                        <li><a class="btn btn-icon-split">Usuarios</a></li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>
            </div>-->
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script> | Sinapsis Technologies. </span>

          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">¿Desea cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione <b>"Salir"</b> si está seguro de finalizar la sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../login/login.html">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page functión scripts -->
  <script src="../../js/functionsSite.js"></script>
  <script src="../../js/Storage.js"></script>
  <script src="js/home.js"></script>
  <script src="../../js/properties.js"></script>

  <script>
    window.onload = loadView
  </script>

</body>

</html>