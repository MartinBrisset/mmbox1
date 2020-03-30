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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

  <!-- styles for video player -->
  <link rel="stylesheet" href="source/style.css">

  <link href="images/favicon.png" rel="icon" type="image/x-icon" />

</head>

<!-- CONECTAR BASE -->
<?php
    include "../../includes/mmbox/conexion.inc";
?>
<!--PIDE DATOS A LA BASE-->
<?php
    //crear sentencia sql
    $sql = "SELECT * FROM eventos WHERE bannerEVENT='destacado' LIMIT 5";
    //ejecutar sql
    $result = mysqli_query($conex,$sql);
    //die($sql);
?>


<body>
<div class="loader-page"></div>
    <!-- Filtro -->
    <div class="filtro">
    </div>

    <!-- Contenedor -->
    <div class="container" id="contenedor">

      <!-- menu pc -->
      <nav class="navbar navbar-expand-lg navbar-dark d-lg-flex d-none" id="navbar">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="100" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ml-auto" id="menu">
              <li class="nav-item">
                <a class="" href="index.php">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="" href="lasala.php">La sala</a>
              </li>
              <li class="nav-item active">
                <a class="" href="contacto.php">Contacto</a>
              </li>
          </ul>

          <a href="https://www.facebook.com/MontevideoMusicBox/" target="_blank"><i class="fab fa-facebook-f social"></i></a>
          <a href="https://twitter.com/MMusicBox/" target="_blank"><i class="fab fa-twitter social"></i></a>
          <a href="https://www.instagram.com/montevideomusicbox/" target="_blank"><i class="fab fa-instagram social"></i></a>

        </div>
      </nav>


      <!-- menu celular -->
      <nav class="navbar d-flex d-lg-none" id="navbar-celular">

          <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="100" alt=""></a>

          <button type="button" class="btn bg-transparent text-white" data-toggle="modal" data-target=".bd-example-modal-sm" id="btn-menu"><i class="fas fa-bars"></i></button>

          <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="menu-modal">
            <div class="modal-dialog  modal-sm">
              <div class="modal-content">


                  <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar-boton">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body text-center">

                    <ul class="navbar-nav" id="nav-celular">
                        <li class="">
                          <a class="" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="">
                          <a class="" href="lasala.php">La sala</a>
                        </li>
                        <li class="">
                          <a class="active" href="contacto.php">Contacto</a>
                        </li>
                    </ul>

                    <a href="https://www.facebook.com/Montevideo-Music-Box-1599179113642591/" target="_blank"><i class="fab fa-facebook-f social"></i></a>
                    <a href="https://twitter.com/MMusicBox/" target="_blank"><i class="fab fa-twitter social"></i></a>
                    <a href="https://www.instagram.com/montevideomusicbox/" target="_blank"><i class="fab fa-instagram social"></i></a>

                  </div>
              </div>
            </div>
          </div>

      </nav>


        <!-- Inicio esctructura -->
        <div class="row" id="contacto">

          <!-- Mapa -->
          <div class='col-12' id='portada'>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.0292510460463!2d-56.154829184168214!3d-34.880611779709625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959f80709572aaf5%3A0xfd883d14b34d36f1!2sMontevideo+Music+Box!5e0!3m2!1ses!2suy!4v1544757382206" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <!-- Info -->
          <div class="col-12 degradado" id='contacto-container'>
            <div class="row text-center">

                <div class='col-12' id='info-contacto'>
                  <div class="row">

                    <div class="col-12 col-md-6 col-lg-4 izq-info-contacto">
                      <h5><i class="fas fa-map-marker-alt icono-contacto"></i> Dirección</h5>
                      <p>Larrañaga esquina Joanicó</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 medio-info-contacto">
                      <h5><i class="fas fa-phone icono-contacto"></i> Teléfono</h5>
                      <p>2484 0712</p>
                    </div>

                    <div class="col-md-12 col-lg-4 der-info-contacto">
                      <h5><i class="fas fa-envelope icono-contacto"></i> Mail</h5>
                      <p>contacto@montevideomusicbox.com.uy</p>
                    </div>

                  </div>
                </div>

            </div>
          </div>
          <?php
                   if (isset($_GET["MSG"])) {
                     $msg = $_GET["MSG"];
                     if ($msg=="Mensaje Enviado") {
                       echo "<div class='col-12 alert alert-dismissible fade show cartel-busqueda' role='alert' id='mensaje'>
                        Su mensaje fue enviado.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                            <div></div>";
                     }elseif ($msg=="error") {
                        echo "<div class='col-12 alert alert-dismissible fade show cartel-busqueda-error' role='alert' id='mensaje'>
                        Lamentablemente hubo un error y no pudimos enviar su mensaje, puede intentarlo de nuevo o comunicarse por otro medio.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                            <div></div>";
                     }

                   }
          ?>
          <!-- Formulario -->
          <div class="col-12 degradado">
            <div class="row">
                <div class='col-12 ' id="formulario-contacto">
                              <form name="formulario_contacto" method="post" action="enviarMail.php" id="dataFRM">
                              <div class='row'>
                                <div class='col-12 col-md-5'>

                                     <div class="form-group">
                                        <input  type="text" name="nombre" maxlength="50" class="form-control" id="dataNAME" placeholder="Nombre">
                                     </div>

                                     <div class="form-group">
                                        <input type="text" name="email" maxlength="80" size="35" id="dataMAIL" class="form-control" placeholder="Mail">
                                     </div>

                                     <div class="form-group">
                                        <input type="text" name="tfno" maxlength="25" size="15" id="dataTEL" class="form-control" placeholder="Teléfono/Celular">
                                     </div>

                                     <div class="form-group">
                                        <input type="text" name="asunto" maxlength="25" size="15" id="dataASUNTO" class="form-control" placeholder="Asunto">
                                     </div>

                                </div>

                                <div class='col-12 col-md-7'>

                                  <div class="form-group">
                                    <textarea name="comentarios" class="form-control" maxlength="500" cols="30" id="dataMENSAJE" placeholder="Mensaje"></textarea>
                                  </div>
                                </div>

                                <div class='col-12'>
                                    <input class="btn btn-enviar col-12" type="button" value="Enviar" onclick="CheckFormCORREO();" />
                                </div>
                              </div>
                           </form>
                          </div>
            </div>
          </div>

          <!-- Footer -->
          <?php include "includes/footer.inc"; ?>

        </div> <!-- fin row -->

    </div> <!-- fin container -->



<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script type="text/javascript">
    $(window).on('load', function () {
       // setTimeout(function () {
      $(".loader-page").css({visibility:"hidden",opacity:"0"})
    //}, 2000);

  });
  </script>

</body>
</html>
