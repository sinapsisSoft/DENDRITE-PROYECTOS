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
          <h1 class="h3 mb-2 text-gray-800">Cotizador</h1>


          <!-- SINAPSIS -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">SINAPSIS</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              </ul>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                  <thead class="text-wine">
                    <tr>
                      <th>% SINAPSIS</th>
                      <th>M% COMISIÒN</th>
                      <th>OPTIMISTA (HORA) </th>
                      <th>% + DÌAS</th>
                      <th>C-PERFILES</th>
                      <th>IMPROVISTOS</th>
                  <tbody>
                    <tr>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="40%"> </td>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="15%"></td>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="5%"></td>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="10%"></td>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="5%"></td>
                      <td style="width: 17%;"><input type="text" class="form-control" required="" readonly="" value="40%"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
            </div>
          </div>
          <!-- SINAPSIS -->

          <!-- HOSTING -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              </ul>
            </div>
            <div class="card-body" style="text-align: right;">
              <a href="#" class="btn btn-primary btn-success" data-toggle="modal" data-target="#exqInsureModalCenter" onclick="clearForm('form_insure', 1);" style="
              margin-bottom: 20px;">Añadir <i class="fas fa-plus"></i></a>
              <form id="form_plan" class="text-left " action="#!" onsubmit="sendData(this.id,event,0);return false">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th style="width: 20%;">HOSTING</th>
                        <th style="width: 11%;">SSL</th>
                        <th style="width: 11%;">DOMINIO </th>
                        <th style="width: 11%;">CORREO</th>                     
                    <tbody>
                      <tr>
                        <td style="width: 11%;">
                          <div class="form-group ">
                            <select class="form-control">
                              <option>Hosting Sencillo</option>
                            </select>
                          </div>
                        </td>
                        <td style="width: 11%;">
                          <div class="form-group">
                            <select class="form-control">
                              <option>SSL</option>
                            </select>
                          </div>
                        </td>
                        <td style="width: 11%;">
                          <div class="form-group">
                            <select class="form-control">
                              <option>net</option>
                            </select>
                          </div>
                        </td>
                        <td style="width: 11%;">
                          <div class="form-group">
                            <select class="form-control">
                              <option>3</option>
                            </select>
                          </div>
                        </td>                     
                        <td style="width: 11%;">
                          <div class="form-group">
                            <select class="form-control">
                              <option>Enterprise</option>
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
          <!-- HOSTING -->


          <!-- PROFILE -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PERFIL</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              </ul>
            </div>
            <div class="card-body" style="text-align: right;">
              <a href="#" class="btn btn-primary btn-success" data-toggle="modal" data-target="#exqInsureModalCenter" onclick="clearForm('form_insure', 1);" style="
              margin-bottom: 20px;">Añadir <i class="fas fa-plus"></i></a>
              <form id="form_plan" class="text-left">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>PERFIL</th>
                        <th>VALOR</th>
                        <th>DÍAS L </th>
                        <th>HORA L </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 40%;">
                          <div class="form-group">
                            <select class="form-control">
                              <option>Desarrollador I</option>
                            </select>
                          </div>
                        </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="7"></td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="4"></td>
                        <td style="width: 20%;"><input type="text" class="form-control" required="" readonly="" value="12"></td>
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

          <!-- EXERCISE-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">ACTIVIDAD</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              </ul>
            </div>
            <div class="card-body" style="text-align: right;">
              <a href="#" class="btn btn-primary btn-success" data-toggle="modal" data-target="#exqInsureModalCenter" onclick="clearForm('form_insure', 1);" style="
              margin-bottom: 20px;">Añadir <i class="fas fa-plus"></i></a>
              <form id="form_plan" class="text-left  was-validated" action="#!" onsubmit="sendData(this.id,event,0);return false">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th style="width: 10%;">ACTIVIDAD</th>
                        <th style="width: 10%;">MÁS PROBABLE (HORA)</th>
                        <th style="width: 10%;">OPTIMISTA (HORA) </th>
                        <th style="width: 10%;">PESIMISTA (HORA)</th>
                        <th style="width: 10%;">ESPERADA (HORA)</th>
                    <tbody>
                      <tr>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="CRUD"> </td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="7"></td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="4"></td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="12"></td>
                        <td style="width: 10%;"><input type="text" class="form-control" required="" readonly="" value="5"></td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th style="width: 13%;">VALOR NETO </th>
                        <th style="width: 13%;">VALOR COMISIÓN (HORA)</th>
                        <th style="width: 13%;">VALOR ADMNISTRATIVO</th>
                        <th style="width: 13%;">VALOR TOTAL</th>
                    <tbody>
                      <tr>
                        <td style="width: 13%;"><input type="text" class="form-control" required="" readonly="" value="$ 49.800"></td>
                        <td style="width: 13%;"><input type="text" class="form-control" required="" readonly="" value="$ 39.840"></td>
                        <td style="width: 13%;"><input type="text" class="form-control" required="" readonly="" value="$ 39.840"></td>
                        <td style="width: 13%;"><input type="text" class="form-control" required="" readonly="" value="$ 99.840"></td>
                        <td>
                          <div>
                            <button class="btn btn-danger" style="margin:0; padding:5px" value=""><i class="material-icons">remove_circle_outline</i></button>
                          </div>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
       <!-- EXERCISE-->


          <!-- SERVICES-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">SERVICIOS</h6>
              <!-- <ul class="nav nav-pills card-header-pills">               -->
              </ul>
            </div>
            <div class="card-header py-3">
              </ul>
            </div>
            <div class="card-body" style="text-align: right;">
              <form id="form_plan" class="text-left " action="#!" onsubmit="sendData(this.id,event,0);return false">
                <div class="table-responsive">
                  <table class="table  " data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25" id="tableCustomers" width="100%" cellspacing="0">
                    <thead class="text-wine">
                      <tr>
                        <th>SERVICIOS</th>
                        <th>TOTAL</th>
                        <th style="color: red;" >PRECIO TOTAL</th>
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-group">
                            <select class="form-control">
                              <option>OPERATIVO</option>
                            </select>
                          </div>
                        </td>
                        <td><input type="text" class="form-control" required="" readonly="" value="$147.000"></td>
                        <td><input type="text" class="form-control " required="" readonly="" value="$2.000.000"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <button class="btn btn-primary" type="submit" value="Submit" form="">Guardar</button>
              <a href="../home/home.php" class="btn btn-secondary">Volver</a>
            </div>
          </div>
               <!-- SERVICES-->
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