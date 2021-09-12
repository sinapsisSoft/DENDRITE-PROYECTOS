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
  <link href='../../vendor/fullcalendar/css/main.css' rel='stylesheet' />
  <link href='../../css/bootstrap-select.css' rel='stylesheet' />
</head>

<body id="page-top">
  <div class="loadPage" id="loadPage"></div>
  <input type="hidden" id="User_id">
  <!--Alert-->
  <div id="myAlert"></div>
  <!--Alert-->
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
          <h1 class="h3 mb-2 text-gray-800">Panel Administrativo</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Administración de eventos</h6>
              <br>
            </div>
            <div class=" mx-auto col-md-6 align-self-center">
              <form class="navbar-form" id="formSearchEvent">
                <div class="input-group col-12">
                  <select id="Client_id" class="col-10" data-live-search="true">
                  </select>
                  <!-- <input type="text" value="" class="form-control bg-light border-0 small" placeholder="Cliente a buscar"> -->
                  <button type="submit" class="btn btn-primary" onclick="searchEvent(event); return false">
                    <i class="fas fa-search fa-sm"></i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </form>
            </div>
            <div class="card-body">
              <div class="table-responsive my-custom-scrollbar">
                <div id='calendar' class="col-md-12"></div>
              </div>
            </div>
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
  <!-- Modal Add Event-->
  <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="POST" id="addForm" onsubmit="addEvent(this);return false">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <input type="hidden" name="Event_id" id="Event_id" value="0">
              <div class="col-10 ">
                <label for="Event_title">Titulo</label>
                <input type="text" class="form-control is-valid" name="Event_title" id="Event_title" placeholder="Título del evento" required>
                <div class="valid-feedback">
                  Campo diligenciado!
                </div>
                <div class="invalid-feedback">
                  Verifique la información
                </div>
              </div>
              <div class="col-2">
                <label for="Event_color">Color</label>
                <input type="color" name="Event_color" id="Event_color" class="form-group" placeholder="Color" required>
              </div>
              <div class="col-6 ">
                <label for="Event_start">Fecha Inicial</label>
                <input type="datetime-local" class="form-control is-valid" name="Event_start" id="Event_start" placeholder="Inicio" required>
                <div class="valid-feedback">
                  Campo diligenciado!
                </div>
                <div class="invalid-feedback">
                  Verifique la información
                </div>
              </div>
              <div class="col-6 ">
                <label for="Event_end">Fecha Final</label>
                <input type="datetime-local" class="form-control is-valid" name="Event_end" id="Event_end" placeholder="Fin" required>
                <div class="valid-feedback">
                  Campo diligenciado!
                </div>
                <div class="invalid-feedback">
                  Verifique la información
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Edit-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <form class="form-horizontal" method="POST" id="editForm" onsubmit="deleteEvent(false); return false">
          <input type="hidden" name="Event_id" id="Event_id">
          <input type="hidden" name="Event_start" id="Event_start">
          <input type="hidden" name="Event_end" id="Event_end">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-10 ">
                <label for="Event_title">Titulo</label>
                <input type="text" class="form-control is-valid" name="Event_title" id="Event_title" placeholder="Título del evento" required>
                <div class="valid-feedback">
                  Campo diligenciado!
                </div>
                <div class="invalid-feedback">
                  Verifique la información
                </div>
              </div>
              <div class="col-2">
                <label for="Event_color">Color</label>
                <input type="color" name="Event_color" id="Event_color" class="form-group" placeholder="Color" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="deleteEvent(true);" style=" left: 20px;position: absolute;" class="btn btn-danger" id="delete" name="delete"><span class="material-icons">
                delete
              </span></button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page functión scripts -->
  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->

  <script src="../../js/functionsSite.js"></script>
  <script src="../../js/Storage.js"></script>
  <script src="../../js/table-filter.js"></script>
  <script src="../../js/table.js"></script>
  <script src="../../js/selectList.js"></script>
  <script src="../../js/bootstrap-select-1.13.18.js"></script>
  <script src="js/event.js"></script>
  <script src="../../js/properties.js"></script>
  <script src='../../vendor/fullcalendar/js/main.js'></script>
  <script>
    getListClient("Client_id", 0);    
    // window.onload = loadView  
    
  </script>

</body>

</html>