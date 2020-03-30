<?php
    // PROCESO EVENTOS UPD

    include "includes/CtrlSession.inc";

    // conectar al Servidor de Base de Datos
    include "../../includes/mmbox/conexion.inc";
    // determinar captura de ID
        $id = $_GET["ID"];
    // crear sentencia SQL
    $sql  = "SELECT * FROM categorias WHERE idCAT=$id";
    // die($sql);
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    // controlar existencia
    if (mysqli_num_rows($result)==0) {
        // mensaje de error
        header("Location: errorPage.php?MSG=ID de evento INEXISTENTE");
    } // endif
    // cargar registro
    $regCAT = mysqli_fetch_array($result);

    $id                 = $regCAT["idCAT"];
    $nombre             = $regCAT["nomCAT"];

    //echo "$id,$nombre";

     //guardar id en la session
    $_SESSION["idcategoria"]=$id;


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
    <link href="css/editordetexto.css" rel="stylesheet">
    <script type="text/javascript" src="js/Funciones.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  </head>

  <body id="page-top">


    <!-- Navbar -->
    <?php
        include "includes/usrnav.inc";
    ?>

    <div id="wrapper">

      <!-- Menu -->
      <?php
          include "includes/usrmenu.inc";
      ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <div class="row">

              <!-- Formulario -->
              <fieldset id="frm" class="col-12 offset-lg-3 offset-md-2 offset-xl-4 col-md-8 col-lg-6 col-xl-4">
                <form id="dataFRM" action="ProcesoActualizarCategoria.php" method="POST">

                  <!-- Columna -->
                  <div class="row" id="formulario-evento">

                      <!-- Columna izquierda -->
                      <div class="col-12">
                        <div class="row">

                          <div class="col-12">
                              <div class="card mb-3">
                                <div class="card-header">
                                  <i class="fas fa-plus"></i> <b>Modificar Categoría</b>
                                </div>

                                <div class="card-body">
                                  <div class="table-responsive">
                                    <div class="form-row">

                                          <!-- Categoria -->
                                          <div class="col-12">
                                                <div class="form-group row">

                                                  <label class="col-md-4 col-form-label">Nombre</label>

                                                  <div class="col-md-8">
                                                    <input id="dataNAME"
                                                           type="text"
                                                           name="NAME"
                                                           maxlength="50"
                                                           title="Máximo 50 caracteres"
                                                           class="form-control text-capitalize"
                                                           value="<?php echo $nombre ?>"
                                                    />

                                                  </div>
                                                </div>
                                          </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="card-footer small text-muted">

                                  <!--   <input class="btn btn-primary" type="button" value="Modificar" onclick="CheckUPDCat();" /> -->
                                  <input class="btn btn-primary btn-sm" type="submit" value="Modificar" />
                                  <input class="btn btn-secondary btn-sm" type="reset" value="Cancelar" onclick="location.href = 'FormCategoriasINS.php'"/> <!--volver al administracion de categorias-->
                                </div>

                            </div>
                          </div>

                        </div>
                      </div>


                  </div><!-- fin Columna -->


                </form>
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


    <script>
                $('#dataIMGPRIN').on('change',function(){
                    //get the file name
                    var fileName = $(this).val();
                    //replace the "Choose a file" label
                    $(this).next('.custom-file-label').html(fileName);
                })
    </script>

    <script>
                $('#dataIMGSEC').on('change',function(){
                    //get the file name
                    var fileName = $(this).val();
                    //replace the "Choose a file" label
                    $(this).next('.custom-file-label').html(fileName);
                })
    </script>


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
