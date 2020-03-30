<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Montevideo Music Box</title>
  <meta name="keywords" content="montevideo, music, box, mmbox, lachina, rock, sala, concierto">
  <meta  name="description" content="Montevideo Music Box">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/Funciones.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
  <link href="images/favicon.png" rel="icon" type="image/x-icon" />

  <!-- styles for video player -->
  <link rel="stylesheet" href="source/style.css">
</head>


<!-- CONECTAR BASE -->
<?php
    include "../../includes/mmbox/conexion.inc";
?>
<!--PIDE DATOS A LA BASE-->
<?php
    //crear sentencia sql
    $sql = "SELECT * FROM eventos WHERE bannerEVENT='destacado' LIMIT 10";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
?>



<body>

    <!-- Video -->
    <div id="background-video" class="background-video d-md-block d-none">
      <img src="images/placeholder.jpg" alt="" class="placeholder-image">
    </div>

    <!-- Filtro -->
    <div class="hola">
    </div>

    <!-- Contenedor -->
    <div class="container" id="contenedor">

        <!-- Menu -->
        <?php
            include "includes/menugral.inc";
        ?>

        <!-- Inicio esctructura -->
        <div class="row">

          <!-- Carousel -->
          <div id="carousel-1" class="carousel slide carousel-fade" data-ride="carousel">

                <div class="carousel-inner">

                          <?php //controlar existencia de resultados
                                if (mysqli_num_rows($result)==0) {
                                  //echo "no anda o no hay registros";
                                  }else{
                                    // recorrer matríz y mostrar eventos
                                      $e = 0; //cuenta la cantidad de eventos
                                      while ($regEVENT=mysqli_fetch_array($result)) {
                                          // cargar registro
                                          $id         = $regEVENT["idEVENT"];
                                          $tit        = $regEVENT["titEVENT"];
                                          $desc       = $regEVENT["descEVENT"];
                                          $iniciodate = $regEVENT["startdateEVENT"];
                                          $iniciotime = $regEVENT["starttimeEVENT"];
                                          $findate    = $regEVENT["enddateEVENT"];
                                          $fintime    = $regEVENT["starttimeEVENT"];
                                          $estad      = $regEVENT["estEVENT"];
                                          $categ      = $regEVENT["catEVENT"];
                                          $link       = $regEVENT["linkEVENT1"];
                                          $e++;

                                          //echo "$e";

                                          //peraparar datos para mostrar
                                          //separa los datos de la base
                                          $mes = date("m",strtotime($iniciodate)); //mes en numero
                                          $dia = date("d",strtotime($iniciodate)); // dia
                                          $iniciotime = date("H:i",strtotime($iniciotime));
                                          $idget = "evento.php?ID=".$id;

                                          //convierte el numero del mes en palabra
                                          if ($mes==1) {
                                              $mes="ENE";
                                          }elseif ($mes==2) {
                                              $mes="FEB";
                                          }elseif ($mes==3) {
                                              $mes="MAR";
                                          }elseif ($mes==4) {
                                              $mes="ABR";
                                          }elseif ($mes==5) {
                                              $mes="MAY";
                                          }elseif ($mes==6) {
                                              $mes="JUN";
                                          }elseif ($mes==7) {
                                              $mes="JUL";
                                          }elseif ($mes==8) {
                                              $mes="AGO";
                                          }elseif ($mes==9) {
                                              $mes="SET";
                                          }elseif ($mes==10) {
                                              $mes="OCT";
                                          }elseif ($mes==11) {
                                              $mes="NOV";
                                          }else{
                                              $mes="DIC";
                                          }//end if

                                          if ($estad == "PROXIMAMENTE") {
                                              $dia=$mes;
                                              $mes="";

                                          }


                                       //cargar la imagen principal
                                          $sql = "SELECT * FROM imagenes WHERE ideventIMG=$id AND catIMG='Main'";
                                          $mainImgResult = mysqli_query($conex,$sql);
                                          //die($sql);

                                          if (mysqli_num_rows($mainImgResult)==0) {
                                              //echo "No existen imagenes para este evento";
                                              $mainImagen = "imagenes/sinimagen.jpg";
                                          }else{
                                              $mainImagenREG = mysqli_fetch_array($mainImgResult);
                                              $mainImagen = $mainImagenREG['urlIMG'];
                                          }

                                          //cargar la imagen principal
                                          $sql1 = "SELECT * FROM imagenes WHERE ideventIMG=$id AND catIMG='Other'";
                                          $otherImgResult = mysqli_query($conex,$sql1);
                                          //die($sql1);

                                          if (mysqli_num_rows($otherImgResult)==0) {
                                              //echo "No existen imagenes para este evento";
                                              $otherImagen = "imagenes/sinimagen.jpg";
                                          }else{
                                              $otherImagenREG = mysqli_fetch_array($otherImgResult);
                                              $otherImagen = $otherImagenREG['urlIMG'];
                                          }



                                          if ($e==1) {
                                            echo "
                <div  class='carousel slide carousel-fade' data-ride='carousel'>

                <div class='carousel-inner'>

                    <!-- Item 1 -->
                    <div class='carousel-item active'>
                      <div class='row margen-0'>

                        <!-- Imagen -->
                          <div class='col-12' id='portada'>

                              <a class='carousel-control-prev ' href='#carousel-1' role='button' data-slide='prev'>
                                  <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                  <span class='sr-only'>Previous</span>
                              </a>

                              <a class='carousel-control-next' href='#carousel-1' role='button' data-slide='next'>
                                  <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                  <span class='sr-only'>Next</span>
                              </a>

                              <img class='img-fluid d-none d-sm-none d-md-block' src='$mainImagen'/>
                              <img class='img-fluid d-block d-md-none' src='$otherImagen'/>

                          </div>

                          <!-- Info -->
                          <div class='col-12 degradado' id='eventos-destacados'>

                                  <div class='row'>

                                      <!-- Fecha -->
                                      <div class='col-12 col-md-9 d-flex align-items-center'>

                                            <div class=' '>
                                                <div class='dia-evento-inicio'>$dia</div>
                                                <div class='mes-evento-inicio'>$mes</div>
                                            </div>

                                            <div class='divisor'>
                                            </div>

                                            <div class=' '>
                                                <div class='titulo-evento-inicio' id='titulo'>$tit</div>
                                                <div class='hora-evento-inicio' id='hora'>$iniciotime HS</div>
                                            </div>

                                      </div>

                                      <!-- Boton -->
                                        <a href='$idget'class='col-12 col-xl-3'>
                                          <div class='row align-items-center h-100' id='boton-comprar'>
                                            <button class='col-12 btn btn-comprar align-middle'>
                                            <i class='fas fa-ticket-alt'></i> COMPRAR ENTRADA
                                            </button>
                                          </div>
                                        </a>

                                  </div>
                          </div>
                      </div>
                    </div>
            ";
                  }else {
                    echo "

                    <!-- Item 1 -->
                    <div class='carousel-item'>
                      <div class='row margen-0'>

                        <!-- Imagen -->
                          <div class='col-12' id='portada'>

                              <a class='carousel-control-prev ' href='#carousel-1' role='button' data-slide='prev'>
                                  <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                  <span class='sr-only'>Previous</span>
                              </a>

                              <a class='carousel-control-next' href='#carousel-1' role='button' data-slide='next'>
                                  <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                  <span class='sr-only'>Next</span>
                              </a>

                              <img class='img-fluid d-none d-sm-none d-md-block' src='$mainImagen'/>
                              <img class='img-fluid d-block d-md-none' src='$otherImagen'/>

                          </div>

                          <!-- Info -->
                          <div class='col-12 degradado' id='eventos-destacados'>

                                  <div class='row'>

                                      <!-- Fecha -->
                                      <div class='col-12 col-md-9 d-flex align-items-center'>

                                            <div class=' '>

                                                <div class='dia-evento-inicio'>$dia</div>
                                                <div class='mes-evento-inicio'>$mes</div>
                                            </div>

                                            <div class='divisor'>
                                            </div>

                                            <div class=' '>
                                                <div class='titulo-evento-inicio' id='titulo'>$tit</div>
                                                <div class='hora-evento-inicio' id='hora'>$iniciotime HS</div>
                                            </div>

                                      </div>

                                      <!-- Boton -->
                                        <a href='$idget'class='col-12 col-xl-3'>
                                          <div class='row align-items-center h-100' id='boton-comprar'>
                                            <button class='col-12 btn btn-comprar align-middle'>
                                            <i class='fas fa-ticket-alt'></i> COMPRAR ENTRADA
                                            </button>
                                          </div>
                                        </a>

                                  </div>
                          </div>
                      </div>
                    </div>

                 ";
                   }
                }

              } ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
              <div class="row">

                <!-- Sidebar -->
                <div class="col-12 col-lg-12 col-xl-3" id="sidebar">
                  <div class="row">

                      <!-- Buscador -->
                      <div class="col-12 col-md-6 col-lg-6 col-xl-12" id="contenedor-buscador">

                        <div id="buscador" class="degradado">
                          <div class="row align-items-center h-100">
                              <div class="col-12 mx-auto">
                          <h4>Buscar evento</h4>
                            <form id="dataFRM" action="ProcesoEventoBUSCAR.php#buscador" method="POST">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Nombre" id="dataBUSCAR" name="BUSCAR">
                                </div>

                                <div class="form-group">
                                  <select class="form-control" id="dataCAT" name="CAT">
                                    <option class="font-weight-normal" selected>Categoría</option>
                                    <?php include "includes/LoadCategoriasEVENT.inc" ?>
                                  </select>
                                </div>

                                <button type="button" class="btn btn-buscar col-12" onclick="CheckEventBuscar();">Buscar</button>

                            </form>
                            </div>
                            </div>
                            </div>

                      </div>

                      <!-- Calendario -->
                      <div class="col-12 col-md-6 col-lg-6 col-xl-12 degradado" id="calendario">
                        <?php include "calendario.php"; ?>
                      </div>

                  </div>
                </div>

                <!-- Eventos -->
                <div class="col-12 col-lg-12 col-xl-9" id="columna-eventos">
                  <div class="row">

                    <?php
                    //PROCESO BUSCAR EVENTOS

                    //conectar al servidor
                    include "../../includes/mmbox/conexion.inc";

                    //capturar datos del formulario
                    $categoriaEvento = $_POST["CAT"];
                    $palabraBuscada  = $_POST["BUSCAR"];

                    //echo $categoriaEvento,$palabraBuscada;

                    //captura fecha y ahora actual
                    date_default_timezone_set("America/Argentina/Buenos_Aires");
                    //$fechahora = date('Y-m-d H:i:s');
                      $fecha = date('Y-m-d');
                      //echo "$fecha";

                    //crear filtros

                    if ($categoriaEvento=="Categoría" && $palabraBuscada=="") {
                      $categoriaEvento="";
                      //muesta todos los eventos siguientes
                      //echo "no hay filtros";
                      //crea la sentencia sql
                      $sql = "SELECT * FROM eventos WHERE (estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE') AND startdateEVENT>='$fecha' ORDER BY startdateEVENT ASC";
                      //die($sql);
                    }elseif ($categoriaEvento!="Categoría" && $palabraBuscada!="") {
                      //echo "Seleccionaron una categoria y una palabra";
                      //crea la sentencia sql
                      $sql = "SELECT * FROM eventos WHERE (estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE') AND catEVENT='$categoriaEvento' AND titEVENT LIKE '%$palabraBuscada%' OR descEVENT='%$palabraBuscada%' >='$fecha' ORDER BY startdateEVENT AND starttimeEVENT ASC";
                      //die($sql);
                    }elseif ($categoriaEvento!="Categoría" && $palabraBuscada=="") {
                      //echo "solo selecciono categoria";
                      //crea la sentencia sql
                      $sql = "SELECT * FROM eventos WHERE (estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE') AND catEVENT='$categoriaEvento' AND startdateEVENT>='$fecha' ORDER BY startdateEVENT ASC";
                        //die($sql);
                    }else{
                      //echo "Solo busco por la palabra";
                      //crea la sentencia sql
                      $sql = "SELECT * FROM eventos WHERE (estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE') AND titEVENT LIKE '%$palabraBuscada%' OR descEVENT='%$palabraBuscada%' AND startdateEVENT>='$fecha' ORDER BY startdateEVENT ASC";
                      //die($sql);
                    }//endif

                    //ejecutar sentencia sql
                    $result=mysqli_query($conex,$sql);
                    //controlar existencia de datos
                    if (mysqli_num_rows($result)==0) {
                      //Si no existen eventos para ese filtro muestra TODOS los eventos con el filtro previo
                      echo "<div class='col-12 alert alert-dismissible fade show cartel-busqueda' role='alert'>
                        No encontramos eventos para el filtro seleccionado.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                            <div></div>";
                      include "muestraeventos.inc";
                    }else{
                      //recorrer matriz y mostrar eventos
                      $e=1;
                      echo "<div class='col-12 alert alert-dismissible fade show cartel-busqueda' role='alert'>
                        Resultados de su búsqueda.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                            <div></div>";
                      while ($regEVENT=mysqli_fetch_array($result)) {
                        //cargar registro
                              $id             = $regEVENT["idEVENT"];
                              $titulo         = $regEVENT["titEVENT"];
                              $iniciodate     = $regEVENT["startdateEVENT"];
                              $iniciotime     = $regEVENT["starttimeEVENT"];
                              $findate        = $regEVENT["enddateEVENT"];
                              $fintime        = $regEVENT["endtimeEVENT"];
                              $linkventa      = $regEVENT["linkEVENT1"];
                              $estad          = $regEVENT["estEVENT"];

                              //peraparar datos para mostrar
                              //separa los datos de la base
                              $mes = date("m",strtotime($iniciodate)); //mes en numero
                              $dia = date("d",strtotime($iniciodate)); // dia
                              $iniciotime = date("H:i",strtotime($iniciotime));
                              $idget = "evento.php?ID=".$id;

                              //convierte el numero del mes en palabra
                              if ($mes==1) {
                                  $mes="ENE";
                              }elseif ($mes==2) {
                                  $mes="FEB";
                              }elseif ($mes==3) {
                                  $mes="MAR";
                              }elseif ($mes==4) {
                                  $mes="ABR";
                              }elseif ($mes==5) {
                                  $mes="MAY";
                              }elseif ($mes==6) {
                                  $mes="JUN";
                              }elseif ($mes==7) {
                                  $mes="JUL";
                              }elseif ($mes==8) {
                                  $mes="AGO";
                              }elseif ($mes==9) {
                                  $mes="SET";
                              }elseif ($mes==10) {
                                  $mes="OCT";
                              }elseif ($mes==11) {
                                  $mes="NOV";
                              }else{
                                  $mes="DIC";
                              }//end if

                              $e++;

                              if ($estad == "PROXIMAMENTE") {
                                              $dia=$mes;
                                              $mes="";

                                          }

                              echo "
                                          <a href='$idget' class='col-12 degradado d-flex align-items-center evento-inicio'>
                                  <div>
                                      <div class='dia-evento-inicio'>$dia</div>
                                      <div class='mes-evento-inicio'>$mes</div>
                                  </div>
                                  <div class='divisor'>
                                  </div>
                                  <div>
                                      <div class='titulo-evento-inicio'>$titulo</div>
                                      <div class='hora-evento-inicio'>$iniciotime HS</div>
                                  </div>
                              </a>


                              ";
                          } // end while
                      }


                    ?>

                  </div>
                </div>

              </div>
          </div>

          <!-- Footer -->
          <?php include "includes/footer.inc"; ?>


        </div> <!-- fin row -->
    </div> <!-- fin container -->



<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- ADD Jquery Video Background -->
  <script src="source/jquery.youtubebackground.js"></script>
  <script>
    jQuery(function($) {

      $('#background-video').YTPlayer({
        fitToBackground: true,
        videoId: '5tHNjWdFRUU',
        pauseOnScroll: false,
        mute: true,
        callback: function() {
          videoCallbackEvents();
        }
      });

      var videoCallbackEvents = function() {
        var player = $('#background-video').data('ytPlayer').player;

        player.addEventListener('onStateChange', function(event){
            console.log("Player State Change", event);

            // OnStateChange Data
            if (event.data === 0) {
                console.log('video ended');
            }
            else if (event.data === 2) {
              console.log('paused');
            }
        });
      }
    });
  </script>
</body>
</html>
