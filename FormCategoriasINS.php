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

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="images/penarol.png" rel="icon" type="image/x-icon" />

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

          <div class="row">
              <!-- Formulario -->
              <fieldset id="frm" class="col-12 col-md-6">
                <form id="dataFRM" action="ProcesoCategoriasINS.php" method="POST">

                  <!-- Columna -->
                  <div class="row" id="formulario-evento">

                      <!-- Columna izquierda -->
                      <div class="col-12">
                        <div class="row">

                          <div class="col-12">
                              <div class="card mb-3">
                                <div class="card-header">
                                  <i class="fas fa-plus"></i> <b>Nueva categoría</b>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">

                                    <div class="form-row">

                                          <!-- Categoria -->
                                          <div class="col-12">
                                                <div class="form-group row">

                                                  <label class="col-4 col-form-label">Nombre</label>

                                                  <div class="col">
                                                    <input id="dataNAME"
                                                           type="text"
                                                           name="NAME"
                                                           maxlength="50"
                                                           title="Máximo 50 caracteres"
                                                           class="form-control text-capitalize"
                                                    />
                                                  </div>

                                                </div>
                                          </div>


                                    </div>
                                </div>

                                </div>
                                <div class="card-footer small text-muted">

                                  <input class="btn btn-primary btn-sm" type="button" value="Crear" onclick="CheckNewCat();" />
                                  <input class="btn btn-secondary btn-sm"type="reset"  value="Reset" />


                                </div>
                            </div>
                          </div>

                        </div>
                      </div>


                  </div><!-- fin Columna -->


                </form>
              </fieldset>

              <!-- Formulario -->
              <fieldset id="frm" class="col-12 col-md-6">
                  <!-- Columna -->
                  <div class="row" id="formulario-evento">

                      <!-- Columna derecha -->
                      <div class="col-12">
                        <div class="row">

                          <div class="col-12">
                              <div class="card mb-3">
                                  <div class="card-header">
                                    <i class="fas fa-list"></i> <b> Categorías existentes</b>
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-hover " id="tblLST">
                                      <?php include "includes/LoadCategoriasEVENTcategorias.inc" ?>
                                      </table>
                                    </div>
                                  </div>
                              </div>
                          </div>

                        </div>
                      </div>

                  </div>


                  </div><!-- fin Columna -->

              </fieldset>
          </div>
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

    <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('[data-toggle="tooltip"]').tooltip({
        placement:'top'
      });
    });
    </script>

  </body>

</html>
