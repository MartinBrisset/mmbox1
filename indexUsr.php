<?php
    include "includes/CtrlSession.inc";

    include "../../includes/mmbox/conexion.inc";
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
    <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.2/dist/circle-progress.js"></script>

  </head>

  <body id="page-top">

    <?php
        include "includes/calculaEspacio.php";
    ?>


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

              <div class="alert col-12" role="alert">
                <h4 class="alert-heading">

                  <?php
                  $nombre = $_SESSION["user"];
                  echo "<span class='capitalize'>¡Hola, <b>$nombre</b>!</span><br />\n";
                  ?>

                </h4>
                <p>

                </p>
                <hr>
              </div>

            </div>

<?php

  //CUENTA LA CANTIDAD DE EVENTOS POR LOS DISTINTOS FILTROS
   //crear sentencia sql - TODOS LOS EVENTOS EN LA BASE
    $sql = "SELECT * FROM eventos";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventos="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventos = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventos++;
        }//endwile
         //echo $eventos;
      }//endif
      //crear sentencia sql - EVENTOS PUBLICADOS
    $sql = "SELECT * FROM eventos WHERE estEVENT='PUBLICADO'";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventosPublicados="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventosPublicados = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventosPublicados++;
        }//endwile
         //echo $eventosPublicados;
      }//endif
      //crear sentencia sql - EVENTOS PENDIENTES
    $sql = "SELECT * FROM eventos WHERE estEVENT='PENDIENTE'";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventosPendientes="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventosPendientes = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventosPendientes++;
        }//endwile
         //echo $eventosPendientes;
      }//endif
      //crear sentencia sql - EVENTOS DE BAJA
    $sql = "SELECT * FROM eventos WHERE estEVENT='DE BAJA'";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventosDeBaja="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventosDeBaja = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventosDeBaja++;
        }//endwile
         //echo $eventosPendientes;
      }//endif
      //crear sentencia sql - EVENTOS SUSPENDIDOS
    $sql = "SELECT * FROM eventos WHERE estEVENT='SUSPENDIDO'";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventosSuspendidos="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventosSuspendidos = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventosSuspendidos++;
        }//endwile
         //echo $eventosPendientes;
      }//endif
      //crear sentencia sql - EVENTOS AGOTADOS
    $sql = "SELECT * FROM eventos WHERE estEVENT='AGOTADO'";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
    if (mysqli_num_rows($result)==0) {
      $eventosAgotados="0";
    }else{
      // recorrer matríz y mostrar eventos
        $eventosAgotados = 0; //cuenta la cantidad de eventos
        while ($regEVENT=mysqli_fetch_array($result)) {
            // contar registros
          $eventosAgotados++;
        }//endwile
         //echo $eventosPendientes;
      }//endif
?>

            <div class="row">

              <div class="col-12 d-none">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <!-- Estado -->
                            <div class="col-12">
                                  <div class="card mb-3">

                                      <div class="card-body">
                                        <div class="row">

                                          <div class="col-12 d-flex">
                                            <div class=""></div>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="card-footer small text-muted"></div>
                                    </div>
                            </div>

                        </div>
                    </div>



                </div>
              </div>

              <div class="col-12 col-lg-12 col-xl-8">

                  <div class="row">

                    <div class="col-12 ">
                      <div class="card mb-3">
                        <div class="row">

                            <!-- Total -->
                            <div class="col-12 col-lg-6 item-evento">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">Total</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventos ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos en total</p>
                                    <p class="ml-auto card-title"><i class="fas fa-list-ul text-success"></i></p>
                                  </div>

                                    <div class="bg-success barrita"></div>

                              </div>
                            </div>

                            <!-- Publicados -->
                            <div class="col-12 col-lg-6 item-evento-der">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">Publicados</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventosPublicados ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos publicados</p>
                                    <p class="ml-auto card-title"><i class="fas fa-check text-primary"></i></p>
                                  </div>


                                    <div class="bg-primary barrita">

                                  </div>

                              </div>
                            </div>

                            <!-- Pendientes -->
                            <div class="col-12 col-lg-6 item-evento">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">Pendientes</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventosPendientes ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos pendientes</p>
                                    <p class="ml-auto card-title"><i class="far fa-clock text-warning"></i></p>
                                  </div>

                                    <div class="bg-warning barrita"></div>

                              </div>
                            </div>

                            <!-- Suspendidos -->
                            <div class="col-12 col-lg-6 item-evento-der">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">Suspendidos</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventosSuspendidos ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos suspendidos</p>
                                    <p class="ml-auto card-title"><i class="fas fa-times text-danger"></i></p>
                                  </div>


                                    <div class="bg-danger barrita">

                                  </div>

                              </div>
                            </div>

                            <!-- Agotados -->
                            <div class="col-12 col-lg-6 item-evento-footer">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">Agotados</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventosAgotados ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos agotados</p>
                                    <p class="ml-auto card-title"><i class="fas fa-ban text-dark"></i></p>
                                  </div>

                                    <div class="bg-dark barrita"></div>

                              </div>
                            </div>

                            <!-- De baja -->
                            <div class="col-12 col-lg-6 item-evento-der-footer">
                              <div class="card-body">

                                  <div class="d-flex">
                                    <h4 class="card-title">De baja</h4>
                                    <h3 class="ml-auto card-title"><?php echo $eventosDeBaja ?></h3>
                                  </div>

                                  <div class="d-flex">
                                    <p class="card-title">Eventos de baja</p>
                                    <p class="ml-auto card-title"><i class="fas fa-arrow-down text-secondary"></i></p>
                                  </div>


                                    <div class="bg-secondary barrita">

                                  </div>

                              </div>
                            </div>

                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-12">
                        <div class="row">

                            <!-- Correos -->
                            <div class="col-12">
                                    <div class="card mb-3">

                                      <div class="card-body">

                                        <div class="row">

                                          <div class="col-12 d-flex">
                                            <div class="mr-auto"><b>Correos corporativos utilizados</b></div>
                                            <h3 class=""><p>6<h5 class="ml-1 pt-2"><span class="text-light font-weight-normal">/10</span></h5></p></h3>
                                          </div>

                                        </div>

                                        <div class="col-12 ">
                                          <div class="row barrita">

                                            <div class="col bg-success barrita-inicio">
                                            </div>
                                            <div class="col bg-success">
                                            </div>
                                            <div class="col bg-success">
                                            </div>
                                            <div class="col bg-success">
                                            </div>
                                            <div class="col bg-success">
                                            </div>
                                            <div class="col bg-success">
                                            </div>
                                            <div class="col bg-light">
                                            </div>
                                            <div class="col bg-light">
                                            </div>
                                            <div class="col bg-light">
                                            </div>
                                            <div class="col bg-light barrita-final">
                                            </div>

                                          </div>
                                        </div>

                                      </div>

                                      <div class="card-footer small text-muted"></div>
                                    </div>
                            </div>

                        </div>
                    </div>
                  </div>

              </div>

              <div class="col-12 col-lg-12 col-xl-4">
                <div class="row">

                    <div class="col-12 col-lg-6 col-xl-12">
                        <div class="row">

                            <!-- Estado -->
                            <div class="col-12">
                                    <div class="card mb-3">

                                      <div class="card-body">
                                        <div class="row">

                                          <div class="col-12 d-flex">
                                            <div class="mr-auto"><b>ID del video de fondo</b></div>
                                            <div class="mr-auto">
                                            <form id="dataFRM" action="ProcesoVideo.php" method="POST">
                                              <input type="text" name="ID" id="dataID">
                                              <input type="button" name="btn" value="Cambiar" class="btn btn-primary btn-sm" onclick="CheckVideo();">
                                            </form>
                                          </div>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="card-footer small text-muted"></div>
                                    </div>
                            </div>
                             <!-- Estado -->
                            <div class="col-12">
                                    <div class="card mb-3">

                                      <div class="card-body">
                                        <div class="row">

                                          <div class="col-12 d-flex">
                                            <div class="mr-auto"><b>Estado del hosting</b></div>
                                            <p class="badge badge-success">ACTIVO</p>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="card-footer small text-muted"></div>
                                    </div>
                            </div>

                            <!-- Vencimiento -->
                            <div class="col-12">
                                    <div class="card mb-3">

                                      <div class="card-body">
                                        <div class="row">

                                          <div class="col-12 d-flex">
                                            <div class="mr-auto"><b>Próximo vencimiento</b></div>
                                            <p class="badge badge-dark">1/12/2019</p>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="card-footer small text-muted"></div>
                                    </div>
                                  </div>

                        </div>
                    </div>

                    <!-- Gráfica -->
                    <div class="col">
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <b>Espacio en Hosting</b>
                                  </div>
                                  <div class="card-body">
                                    <div class="col-12 text-center">
                                      <div class="progress" data-percentage="<?php echo $porcentajeGrafica; ?>">

                                        <span class="progress-left">
                                          <span class="progress-bar"></span>
                                        </span>

                                        <div class="text-center col-12">
                                          <div class="row align-items-center h-100">
                                              <div class="col-12 mx-auto">
                                          <h3><?php echo $porcentajeReal; ?>%</h3>
                                          <span class="bagde badge-dark cosito">OCUPADO</span>
                                          </div>
                                          </div>
                                        </div>

                                        <span class="progress-right">
                                          <span class="progress-bar"></span>
                                        </span>

                                      </div>
                                    </div>

                                  </div>
                                  <div class="card-footer small text-muted">Actualizado hoy a las 6:00 AM.</div>
                                </div>
                              </div>


                </div>
              </div>

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
    <script src="js/demo/chart-pie-demo.js"></script>



  </body>

</html>
