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

    <script type="text/javascript" src="js/Funciones.js"></script>

    <link href="images/penarol.png" rel="icon" type="image/x-icon" />

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

          <!-- Administrar eventos -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <b>Administrar eventos</b>
            </div>
            <div class="card-body">

              <!-- Filtros -->
              <div class="row">

                  <div class="col-12 " id="filtros">
                      <form action="administracion.php" method="GET">

                            <div class="form-row">

                              <div class="form-group col-12 col-md-5 col-lg-4">
                                  <select id="dataEST" class="form-control" name="EST" title="Estado">
                                    <option value="">Estado</option>
                                    <option value="PUBLICADO">Publicado</option>
                                    <option value="PENDIENTE">Pendiente</option>
                                    <option value="AGOTADO">Agotado</option>
                                    <option value="SUSPENDIDO">Suspendido</option>
                                    <option value="OCULTO">Oculto</option>
                                    <option value="PROXIMAMENTE">Proximamente</option>
                                    <option value="DE BAJA">De baja</option>
                                  </select>
                              </div>

                              <div class="form-group col-12 col-md-5 col-lg-4">
                                  <select id="dataCAT" name="CAT" title="Categoria" class="form-control">
                                    <option value="">Categoria</option>
                                    <?php
                                          include "includes/LoadCategoriasEVENT.inc";
                                     ?>
                                  </select>
                              </div>

                              <div class="form-group col-12 col-md-2">
                                  <input type="submit" value="Filtrar" class="btn btn-primary">
                              </div>

                           </div>
                      </form>
                  </div>

              </div>

              <!-- Tabla -->
              <div class="table-responsive">
                        <table class="table table-hover" id="tblLST" width="100%" cellspacing="0">


                          <!--MOSTRAR LOS PRIMEROS 10 O 15 EVENTOS PAGINACION-->
                         <?php

                                //dar DE BAJA a los eventos viejos

                                include "eventofecha.inc";

                               // capturar filtro - estado
                              if (isset($_GET["EST"])) {
                                  $est = $_GET["EST"];
                                 // echo "$est";
                              }else {
                                  $est="";
                                //  echo "$est";
                              }//endif

                             //capturar filtro - categoria
                             if (isset($_GET["CAT"])) {
                                 $cat = $_GET["CAT"];
                                // echo "$cat";
                              }else{
                                  $cat="";
                                 // echo "$cat";
                             }//endif

                              // capturar y determinar orden
                           //   if (isset($_GET["ORD"])) {
                            //      $orden = $_GET["ORD"];
                           //   } else {
                                  $orden = "startdateEVENT,starttimeEVENT";
                            //  } // endif

                              $filtro=""; //el filtro predeterminado, trae todos los eventos excepto los dados DE BAJA

                              if ($est=="" && $cat=="") {
                                $filtro = "WHERE estEVENT!='DE BAJA'";
                               // echo "Estan los 2 putos vacios";
                              }
                              if ($est!="" && $cat=="") {
                                $filtro = "WHERE estEVENT='$est' AND estEVENT!='DE BAJA' ";
                               // echo "Estado tiene algo y categoria no";
                              }
                              if ($est!="" && $cat!="") {
                                $filtro = "WHERE estEVENT='$est' AND estEVENT!='DE BAJA' AND catEVENT='$cat' ";
                               // echo "Estado tiene algo y categoria tambien";
                              }
                              if ($est=="" && $cat!="") {
                                $filtro = "WHERE catEVENT='$cat' AND estEVENT!='DE BAJA' ";
                               // echo "Estado esta vacio, pero categoria no";
                              }

                              //mostrar los eventos dados DE BAJA
                               if ($est=="DE BAJA" && $cat=="") {
                                $filtro = "WHERE estEVENT='$est'";
                               // echo "Estan los 2 putos vacios";
                              }
                               if ($est=="DE BAJA" && $cat!="") {
                                $filtro = "WHERE estEVENT='$est' AND catEVENT='$cat' ";
                               // echo "Estado tiene algo y categoria tambien";
                              }

                              //armar sql con los filtros para contar el total de registros y poder hacer la paginacion
                              $sql  = "SELECT * ";
                              $sql .= "FROM eventos ";
                              $sql .= "$filtro ORDER BY $orden";
                              // ejecutar sentencia SQL
                              //die($sql);
                              $result1 = mysqli_query($conex,$sql);

                              //paginacion del orto
                              $tamagnoPaginas = 10;

                                if (isset($_GET["PAGE"])) {

                                  if ($_GET["PAGE"]==1) {
                                      //echo "puta";
                                      $pagina=1;

                                  } else{

                                    $pagina=$_GET["PAGE"];
                                  }
                                } else{
                                   $pagina = 1;
                                }

                              //$pagina = 1;
                              $empezarDesde = ($pagina-1)*$tamagnoPaginas;
                              $numFilas=(mysqli_num_rows($result1));

                              $totalPaginas=ceil ($numFilas/$tamagnoPaginas);

                             // echo "Numero de registros de la consulta del orto".$numFilas;
                             // echo "Mostramos " . $tamagnoPaginas."Registros por pagina";
                             // echo "Mosrando la pagina " . $pagina . "de " . $totalPaginas;
                             // echo "Mostrar desde " . $empezarDesde;


                              //armar sql con los filtros y el limite, para hacer la paginacion
                              $sql  = "SELECT * ";
                              $sql .= "FROM eventos ";
                              $sql .= "$filtro ORDER BY $orden LIMIT $empezarDesde,$tamagnoPaginas";
                              // ejecutar sentencia SQL
                              //die($sql);
                              $result = mysqli_query($conex,$sql);


                              // controlar existencia de datos
                              if (mysqli_num_rows($result)==0) {
                                  die("todavía no existen eventos o no hay evento para el filtro seleccionado");
                              } // endif
                    echo "
                          <tr id='header-tabla'>
                              <th><a class='text-decoration-none' >ESTADO</a></th>
                              <th><a class='text-decoration-none' >EVENTO</a></th>
                              <th><a class='text-decoration-none' >FECHA</a></th>
                              <th><a class='text-decoration-none' >HORA</th>
                              <th><a class='text-decoration-none' >CATEGORÍA</a></th>
                              <th><a class='text-decoration-none' >ULT. MOD.</a></th>
                          </tr>
                          ";

                              // recorrer matríz y mostrar noticias
                              $fila = 1;
                              while ($regEVENT=mysqli_fetch_array($result)) {
                                  // cargar registro
                                  $id             = $regEVENT["idEVENT"];
                                  $titulo         = $regEVENT["titEVENT"];
                                  $descripcion    = $regEVENT["descEVENT"];
                                  $descripcion    = substr($descripcion, 0, 100); //Solo muestra del caracter 0 hasta el 100 y lo concatena con ...
                                  $iniciodate     = $regEVENT["startdateEVENT"];
                                  $iniciotime     = $regEVENT["starttimeEVENT"];
                                  $findate        = $regEVENT["enddateEVENT"];
                                  $fintime        = $regEVENT["endtimeEVENT"];
                                  $estado         = $regEVENT["estEVENT"];
                                  $categoria      = $regEVENT["catEVENT"];
                                  $autor          = $regEVENT["autorEVENT"];
                                  $check          = $regEVENT["bannerEVENT"];
                                  $link1          = $regEVENT["linkEVENT1"];
                                  $link1          = substr($link1, 0, 30);
                                  $link2          = $regEVENT["linkEVENT2"];
                                  $link2          = substr($link2, 0, 30);
                                  $link3          = $regEVENT["linkEVENT3"];
                                  $link3          = substr($link3, 0, 30);

                                  $iniciohora     = date("H:i",strtotime($iniciotime));
                                  $finhora        = date("H:i",strtotime($fintime));
                                  $iniciodate     = date("d/m/Y",strtotime($iniciodate));
                                  $findate        = date("d/m/Y",strtotime($findate));

                                  //controlar para mostrar

                                      //captura imagenes
                                      $sql = "SELECT * FROM imagenes WHERE ideventIMG=$id AND catIMG='Main'";
                                      $mainImgResult = mysqli_query($conex,$sql);
                                      //die($sql);

                                      if (mysqli_num_rows($mainImgResult)==0) {
                                          //echo "No existen imagenes para este evento";
                                          $imagen1 = "imagenes/sinimagen.jpg";
                                      }else{
                                          $mainImagenREG = mysqli_fetch_array($mainImgResult);
                                          $imagen1 = $mainImagenREG['urlIMG'];
                                      }
                                       //captura imagenes
                                      $sql = "SELECT * FROM imagenes WHERE ideventIMG=$id AND catIMG='Other'";
                                      $mainImgResult = mysqli_query($conex,$sql);
                                      //die($sql);

                                      if (mysqli_num_rows($mainImgResult)==0) {
                                          //echo "No existen imagenes para este evento";
                                          $imagen2 = "imagenes/sinimagen.jpg";
                                      }else{
                                          $mainImagenREG = mysqli_fetch_array($mainImgResult);
                                          $imagen2 = $mainImagenREG['urlIMG'];
                                      }

                                      //concatena fecha y hora
                                      $inicio = $iniciodate." ".$iniciohora;
                                      $fin    = $findate." ".$finhora;

                                      // calcular fila par / impar
                                      $resto = $fila%2;
                                      // determinar fila par / impar
                                      if ($resto==0) {
                                          echo "<tr class='filaPAR'>";
                                      } else {
                                          echo "<tr class='filaIMP'>";
                                      } // endif
                                         //cambiar clase segun al estado
                                      if ($estado=="PUBLICADO") {
                                        $clase="badge badge-primary";
                                      }elseif ($estado=="DE BAJA") {
                                        $clase="badge badge-secondary";
                                      }elseif ($estado=="SUSPENDIDO") {
                                        $clase="badge badge-danger";
                                      }elseif ($estado=="PENDIENTE") {
                                        $clase="badge badge-warning";
                                      }elseif ($estado=="AGOTADO") {
                                        $clase="badge badge-dark";
                                      }elseif ($estado=="PROXIMAMENTE") {
                                        $clase="badge badge-dark";
                                      }else{
                                        $clase="badge badge-primary";
                                      }
                                      echo " <td><span class='$clase'>$estado</span></td>
                                             <td><b>$titulo</b></td>
                                             <td>$iniciodate</td>
                                             <td>$iniciohora</td>
                                             <td class='text-capitalize'>$categoria</td>
                                             <td class='text-capitalize'>$autor</td>
                                             <td class='iconitos'>
                                                 <a href=\"javascript:window.parent.location.href='ProcesoEventosUPD.php?ID=$id' \" data-toggle='tooltip' title='Editar'>
                                                   <i class='fas fa-wrench'></i>
                                                  </a>
                                                  <a href=\"javascript:DeleteREG($id)\" data-toggle='tooltip' title='Eliminar'>
                                                   <i class='fas fa-times'></i>
                                                  </a>
                                             </td>
                                            </tr>
                                          ";
                                      $fila++;
                              } // end while
                             // cerrar conexión
                              mysqli_close($conex);
                            ?>
                          </table>
              </div>

            </div>

              <!-- Paginacion -->
              <nav aria-label="...">
                <ul class="pagination">
                      <?php
                          if ($pagina==1) {
                            echo "  <li class='page-item disabled'>
                                      <a class='page-link' tabindex='-1' aria-disabled='true' onclick=''>Anterior</a>
                                    </li>";
                          }elseif ($pagina!=1) {
                            $calculaPagina=$pagina;
                            $calculaPagina--;
                            echo "  <li class='page-item'>
                                      <a class='page-link text-secondary' href='administracion.php?PAGE=$calculaPagina&EST=$est&CAT=$cat'>Anterior</a>
                                    </li>";
                          }

                        for ($i=1; $i<=$totalPaginas ; $i++) {
                            if ($i==$pagina) {
                              echo "<li class='page-item active' aria-current='page'>
                                <a class='page-link' href='?PAGE=" . $i . "&EST=$est&CAT=$cat'>" . $i . "</a>";
                            }elseif ($i!=$pagina) {
                              echo "<li class='page-item'>
                                <a class='page-link text-secondary' href='?PAGE=" . $i . "&EST=$est&CAT=$cat'>" . $i . "</a>";
                            }
                          //echo "$i";
                        }
                      //  echo "$i";
                        if ($pagina==$i-1) {
                            echo "  <li class='page-item disabled'>
                                      <a class='page-link' tabindex='-1' aria-disabled='true' onclick=''>Siguiente</a>
                                    </li>";
                          }elseif ($pagina!=$i-1) {
                            $calculaPagina=$pagina;
                            $calculaPagina++;
                            echo "  <li class='page-item'>
                                      <a class='page-link text-secondary' href='administracion.php?PAGE=$calculaPagina&EST=$est&CAT=$cat'>Siguiente</a>
                                    </li>";
                          }
                      ?>
                </ul>
              </nav>

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
