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
  <style>
    .alertPassword {
      text-align: center;
      background: #e23a3a;
      margin: 10px;
      padding: 5px;
      color: wheat;
      font-size: 18px;
    }

    .alertView {
      display: block;
    }

    .alertHidden {
      display: none;
    }
  </style>
</head>

<body id="page-top">
  <!-- <div class="loadPage" id="loadPage"></div> -->

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
          <h1 class="h3 mb-2 text-gray-800">Proyectos</h1>


          <!-- VERSION -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Número de cotización</h6>
            </div>

            <div class="card-body" style="text-align: right;">
              <form id="form_plan" class="text-left">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>N°cotización</th>
                        <th>Versión</th>                      
                        <th>Horas estimada</th>
                      </tr>
                    </thead>                   
                    <tbody>
                      <tr>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" value="001"> </td>
                        <td>
                          </button>
                          <button type="submit" class="btn btn-primary" onclick="">
                            <i class="fas fa-search fa-sm"></i>
                        </td>
                        
                        <td style="width: 10%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                            </select>
                          </div>
                        </td>                     
                      </tr>
                    </tbody>
                  </table>

                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>Nombe proyecto</th>
                        <th>Cliente</th>
                      </tr>
                    </thead>                   
                    <tbody>
                      <tr>
                        <td style="width: 60%;"><input type="text" class="form-control" required="" value="Formularios"> </td>
                        <td style="width: 40%;"><input type="text" class="form-control" required="" value="Clinica pepe"> </td>                      
                      </tr>
                    </tbody>                    
                  </table>
                </div>
              </form>
            </div>
          </div>
          <!-- VERSION -->





          <!-- exercise-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Actividades</h6>
              <h6 class="m-0 font-weight-bold text-primary " style="text-align: right; color: red;">80% completado</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

            </div>
            <div class="card-body" style="text-align: right;">
              <form id="form_plan" class="text-left">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>Nombre</th>
                        <th>Horas estimadas</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 40%;"><input type="text" class="form-control" required="" value="FORMULARIOS WEB"> </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" value="60"> </td>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>BAJA</option>
                              <option>ALTA</option>
                              <option>MEDIA</option>
                            </select>
                          </div>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>PENDIENTE</option>
                              <option>INICIADO</option>
                              <option>FINALIZADO</option>
                            </select>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%;"><input type="text" class="form-control" required="" value="FORMULARIOS WEB"> </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" value="60"> </td>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>BAJA</option>
                              <option>ALTA</option>
                              <option>MEDIA</option>
                            </select>
                          </div>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>PENDIENTE</option>
                              <option>INICIADO</option>
                              <option>FINALIZADO</option>
                            </select>
                          </div>
                        </td>
                      </tr>                      
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Actividades adicionales</h6>
              <h6 class="m-0 font-weight-bold text-primary " style="text-align: right; color: red;">30% completado</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="card-body" style="text-align: right;">
              <form id="form_plan" class="text-left">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>Nombre</th>
                        <th>Horas estimadas</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 40%;"><input type="text" class="form-control" required="" value="FORMULARIOS WEB"> </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" value="60"> </td>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>BAJA</option>
                              <option>ALTA</option>
                              <option>MEDIA</option>
                            </select>
                          </div>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>PENDIENTE</option>
                              <option>INICIADO</option>
                              <option>FINALIZADO</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-danger" style="margin:0; padding:5px" value=""><i class="material-icons">remove_circle_outline</i></button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%;"><input type="text" class="form-control" required="" value="CRUD"> </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" value="100"> </td>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>BAJA</option>
                              <option>ALTA</option>
                              <option>MEDIA</option>
                            </select>
                          </div>
                        <td style="width: 20%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option selected>-- Seleccione una opción --</option>
                              <option>PENDIENTE</option>
                              <option>INICIADO</option>
                              <option>FINALIZADO</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-danger" style="margin:0; padding:5px" value=""><i class="material-icons">remove_circle_outline</i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
          <!-- PROFILE-->

        </div>
        <!-- End exercise-->


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
        <!-- Modal -->
        <div class="modal fade fullscreen-modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12">
                  <form id="form_users" class="text-left  was-validated" action="#!" onsubmit="confirmPass();return false">
                    <input type="number" id="User_id" style="visibility:hidden">
                    <div class="form-row mb-1">
                      <div class="col-md-3 mb-1">
                        <!-- Documento -->
                        <label class="bmd-label-floating"> Identificación</label>
                        <input type="text" id="User_identification" class="form-control form-control-sm read" placeholder="Identificación" required>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione una identificación válido.</div>
                      </div>
                      <div class="col-md-3 mb-1">
                        <!-- Nombre -->
                        <label class="bmd-label-floating"> Nombre</label>
                        <input type="text" id="User_name" class="form-control form-control-sm " placeholder="Nombre" required>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione un nombre válido.</div>
                      </div>
                      <div class="col-md-4 mb-1">
                        <!-- Email -->
                        <label class="bmd-label-floating"> E-mail</label>
                        <input type="email" id="User_email" class="form-control form-control-sm read" placeholder="E-mail" required>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione un e-mail válido.</div>
                      </div>
                      <div class="col-md-2 mb-1">
                        <!-- Teléfono -->
                        <label class="bmd-label-floating"> Teléfono</label>
                        <input type="text" pattern="[0-9]{7,10}" id="User_telephone" class="form-control form-control-sm" placeholder="Teléfono" maxlength="10">
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione un teléfono válido.</div>
                      </div>
                    </div>
                    <div class="form-row mb-1">
                      <div class="col-md-3 mb-1">
                        <!-- Cargo -->
                        <label class="bmd-label-floating"> Cargo</label>
                        <input type="text" id="User_title" class="form-control form-control-sm " placeholder="Cargo" required>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione un dato válido.</div>
                      </div>
                      <div class="col-md-3 mb-1 password">
                        <!-- Contraseña -->
                        <label class="bmd-label-floating"> Contraseña</label>
                        <input type="password" pattern=".{6,}" id="Login_password" title="Ocho o más caracteres" class="form-control form-control-sm pass " placeholder="Contraseña" required>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Proporcione una contraseña válida.</div>
                      </div>
                      <div class="col-md-4 mb-1 password">
                        <!-- Confirmar Contraseña -->
                        <label class="bmd-label-floating">Confirmar Contraseña</label>
                        <div class="input-group mb-2">
                          <input type="password" pattern=".{6,}" id="Repeat_password" title="Ocho o más caracteres" class="form-control form-control-sm pass " placeholder="Confirme Contraseña" required>
                          <div class="input-group-prepend">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input btn-primary" id="defaultUnchecked">
                              <label class="custom-control-label" style="margin-left: 10px" for="defaultUnchecked"><i class="material-icons viewI">visibility_off</i></label>
                            </div>
                          </div>
                          <div class="valid-feedback">Ok!</div>
                          <div class="invalid-feedback">Proporcione una confirme contraseña válida.</div>
                        </div>

                      </div>
                      <div class="col-md-2 mb-1">
                        <!-- Estado -->
                        <label class="bmd-label-floating">Estado</label>
                        <select id="Stat_id" class="custom-select custom-select-sm" required>
                        </select>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Seleccione una opción válido.</div>
                      </div>
                    </div>
                    <div class="form-row mb-1">
                      <div class="col-md-3 mb-1">
                        <!-- Rol -->
                        <label class="bmd-label-floating"> Rol</label>
                        <select id="Role_id" class="custom-select custom-select-sm" required>
                          <option disabled selected value> -- Seleccione una opción -- </option>

                        </select>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Seleccione una opción válido.</div>
                      </div>
                      <div class="col-md-3 mb-1">
                        <!-- Grupo de seguridad -->
                        <label class="bmd-label-floating"> Grupo de seguridad</label>
                        <select id="Sgroup_id" class="custom-select custom-select-sm" required>
                          <option disabled selected value> -- Seleccione una opción -- </option>

                        </select>
                        <div class="valid-feedback">Ok!</div>
                        <div class="invalid-feedback">Seleccione una opción válido.</div>
                      </div>
                    </div>
                    <!-- -->

                    <div class="alertPassword alertHidden" id="alertPassword" role="alert">
                      Contraseña no coincide
                    </div>

                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" value="Submit" form="form_users">Guardar</button>
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
        <!-- Page level plugins -->
        <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>


        <!-- Page level custom scripts -->

        <script src="../../js/functionsSite.js"></script>
        <script src="../../js/Storage.js"></script>
        <script src="../../js/table-filter.js"></script>
        <script src="../../js/table.js"></script>
        <script src="../../js/selectList.js"></script>
        <script src="../../js/properties.js"></script>



</body>

</html>