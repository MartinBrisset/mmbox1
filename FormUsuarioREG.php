<?php
    include "includes/CtrlSession.inc";

 ?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MMBox | Panel de control</title>
    <link href="images/penarol.png" rel="icon" type="image/x-icon" />
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript" src="js/Funciones.js"></script>

  </head>

  <body id="page-top">

    <!-- Navbar -->
    <?php
        include "includes/usrnav.inc";
    ?>

    <div id="wrapper">

      <?php
          include "includes/usrmenu.inc";
      ?>

      <div id="content-wrapper">

        <div class="container-fluid">


          <!-- Formulario -->
          <fieldset id="frm">
            <form id="dataFRM" action="ProcesoUsuariosREG.php" method="POST">

              <!-- Columna -->
              <div class="row" id="formulario-evento">

                  <!-- Columna derecha -->
                  <div class="col-12 offset-lg-3 offset-md-2 offset-xl-4 col-md-8 col-lg-6 col-xl-4">
                    <div class="row">

                      <div class="col-12">
                          <div class="card mb-3">
                            <div class="card-header">
                              <i class="fas fa-user"></i> <b>Nuevo usuario</b>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">

                                <div class="form-row">

                                      <!-- Usuario -->
                                      <div class="col-12">
                                            <div class="form-group row">

                                              <label class="col-6 col-form-label">Usuario</label>

                                              <div class="col">
                                                <input id="dataUSR"
                                                       type="text"
                                                       name="USR"
                                                       maxlength="50"
                                                       title="Máximo 50 caracteres"
                                                       class="form-control"
                                                />
                                              </div>

                                            </div>
                                      </div>

                                      <!-- Contraseña -->
                                      <div class="col-12">
                                            <div class="form-group row">

                                              <label class="col-6 col-form-label">Contraseña</label>

                                              <div class="col-6">
                                                <input id="dataPASW"
                                                       type="password"
                                                       name="PASW"
                                                       maxlength="100"
                                                       title="Máximo 100 caracteres"
                                                       class="form-control"
                                                />
                                              </div>

                                            </div>
                                      </div>

                                      <!-- Perfil -->
                                      <div class="col-12">
                                            <div class="form-group row">

                                              <label class="col-6 col-form-label">Perfil</label>

                                              <div class="col-6">
                                                <select id="dataPERFIL" class="form-control" name="PERF" title="Seleccione Perfil">
                                                  <option value="">Seleccionar Perfil</option>
                                                   <option value="ADMINISTRADOR">Administrador</option>
                                                  </select>
                                              </div>

                                            </div>
                                      </div>

                                </div>
                            </div>

                            </div>
                            <div class="card-footer small text-muted">

                              <input class="btn btn-primary btn-sm" type="button" value="Crear" onclick="CheckNewUsr();" />
                              <input class="btn btn-secondary btn-sm"type="reset"  value="Reset" />


                            </div>
                        </div>
                      </div>

                    </div>
                  </div>

              </div><!-- fin Columna -->

            </form>
          </fieldset>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
            include "includes/usrfooter.inc";
        ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
