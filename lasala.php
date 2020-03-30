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
    $sql = "SELECT * FROM eventos WHERE bannerEVENT='destacado' LIMIT 10";
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
              <li class="nav-item active">
                <a class="" href="lasala.php">La sala</a>
              </li>
              <li class="nav-item">
                <a class="" href="contacto.php">Contacto</a>
              </li>
          </ul>

          <a href="https://www.facebook.com/Montevideo-Music-Box-1599179113642591/" target="_blank"><i class="fab fa-facebook-f social"></i></a>
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
                          <a class="active" href="lasala.php">La sala</a>
                        </li>
                        <li class="">
                          <a class="" href="contacto.php">Contacto</a>
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
        <div class="row">

            <!-- Carousel -->
          <div id="carousel-1" class="carousel slide carousel-fade" data-ride="carousel">

                <div class="carousel-inner">

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

                            <img class='img-fluid' src='images/bannersala.png' alt='First slide'>

                        </div>

                        <!-- Info -->
                        <!--
                        <div class='col-12 degradado' id='info-sala'>

                          <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Mi eget mauris pharetra et. Quis hendrerit dolor magna eget est lorem ipsum. Mauris augue neque gravida in fermentum et sollicitudin. In fermentum et sollicitudin ac orci phasellus. Urna molestie at elementum eu facilisis sed. Dui ut ornare lectus sit amet est. Dignissim enim sit amet venenatis. Nibh nisl condimentum id venenatis a condimentum vitae sapien. Libero enim sed faucibus turpis in eu. Quis eleifend quam adipiscing vitae proin. Tellus mauris a diam maecenas sed enim ut. Pellentesque eu tincidunt tortor aliquam nulla. Amet consectetur adipiscing elit duis.
                          </p>
                          <p>
                          Pulvinar neque laoreet suspendisse interdum consectetur libero. Massa massa ultricies mi quis hendrerit dolor. Magna fermentum iaculis eu non. Rhoncus dolor purus non enim praesent elementum. Laoreet suspendisse interdum consectetur libero id faucibus nisl. Netus et malesuada fames ac turpis egestas integer. Ut ornare lectus sit amet est placerat. Duis at consectetur lorem donec massa. Ultrices gravida dictum fusce ut. Faucibus turpis in eu mi bibendum. Non consectetur a erat nam at lectus urna.
                          </p>
                        </div>
                      -->
                    </div>
                  </div>

                  <!-- Item 3 -->
                  <div class='carousel-item '>
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

                            <img class='img-fluid' src='images/bannersala3.png' alt='First slide'>

                        </div>

                        <!-- Info -->
                         <!--
                        <div class='col-12 degradado' id='info-sala'>

                          <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Mi eget mauris pharetra et. Quis hendrerit dolor magna eget est lorem ipsum. Mauris augue neque gravida in fermentum et sollicitudin. In fermentum et sollicitudin ac orci phasellus. Urna molestie at elementum eu facilisis sed. Dui ut ornare lectus sit amet est. Dignissim enim sit amet venenatis. Nibh nisl condimentum id venenatis a condimentum vitae sapien. Libero enim sed faucibus turpis in eu. Quis eleifend quam adipiscing vitae proin. Tellus mauris a diam maecenas sed enim ut. Pellentesque eu tincidunt tortor aliquam nulla. Amet consectetur adipiscing elit duis.
                          </p>
                          <p>
                          Pulvinar neque laoreet suspendisse interdum consectetur libero. Massa massa ultricies mi quis hendrerit dolor. Magna fermentum iaculis eu non. Rhoncus dolor purus non enim praesent elementum. Laoreet suspendisse interdum consectetur libero id faucibus nisl. Netus et malesuada fames ac turpis egestas integer. Ut ornare lectus sit amet est placerat. Duis at consectetur lorem donec massa. Ultrices gravida dictum fusce ut. Faucibus turpis in eu mi bibendum. Non consectetur a erat nam at lectus urna.
                          </p>
                        </div>
                      -->
                    </div>
                  </div>

                  <!-- Item 4 -->
                  <div class='carousel-item '>
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

                            <img class='img-fluid' src='images/bannersala4.png' alt='First slide'>

                        </div>

                        <!-- Info -->
                        <!--
                        <div class='col-12 degradado' id='info-sala'>

                          <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Mi eget mauris pharetra et. Quis hendrerit dolor magna eget est lorem ipsum. Mauris augue neque gravida in fermentum et sollicitudin. In fermentum et sollicitudin ac orci phasellus. Urna molestie at elementum eu facilisis sed. Dui ut ornare lectus sit amet est. Dignissim enim sit amet venenatis. Nibh nisl condimentum id venenatis a condimentum vitae sapien. Libero enim sed faucibus turpis in eu. Quis eleifend quam adipiscing vitae proin. Tellus mauris a diam maecenas sed enim ut. Pellentesque eu tincidunt tortor aliquam nulla. Amet consectetur adipiscing elit duis.
                          </p>
                          <p>
                          Pulvinar neque laoreet suspendisse interdum consectetur libero. Massa massa ultricies mi quis hendrerit dolor. Magna fermentum iaculis eu non. Rhoncus dolor purus non enim praesent elementum. Laoreet suspendisse interdum consectetur libero id faucibus nisl. Netus et malesuada fames ac turpis egestas integer. Ut ornare lectus sit amet est placerat. Duis at consectetur lorem donec massa. Ultrices gravida dictum fusce ut. Faucibus turpis in eu mi bibendum. Non consectetur a erat nam at lectus urna.
                          </p>
                        </div>
                      -->
                    </div>
                  </div>

                </div>

          </div>

            <div class="col-12">
              <div class="tz-gallery">


                  <!-- Naranja -->
                  <div class="row">
                      <!-- Destacada -->
                      <div class="col-md-6">
                        <a class="lightbox" href="images/lasala/naranja1.jpg">
                            <img class="img-fluid" src="images/lasala/naranja1.jpg" alt=" ">
                        </a>
                      </div>

                      <div class="col-md-6">


                        <div class="row columna-fotos">

                            <div class="col-md-6">
                              <a class="lightbox" href="images/lasala/naranja2.jpg">
                                  <img class="img-fluid" src="images/lasala/naranja2.jpg" alt=" ">
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="lightbox" href="images/lasala/naranja3.jpg">
                                  <img class="img-fluid" src="images/lasala/naranja3.jpg" alt=" ">
                              </a>
                            </div>

                        </div>

                        <div class="row columna-fotos">

                            <div class="col">
                              <a class="lightbox" href="images/lasala/naranja4.jpg">
                                <img class="img-fluid" src="images/lasala/naranja4.jpg">
                              </a>
                            </div>

                            <div class="col">
                              <a class="lightbox" href="images/lasala/naranja5.jpg">
                                <img class="img-fluid" src="images/lasala/naranja5.jpg">
                              </a>
                            </div>

                        </div>

                      </div>


                  </div>

                  <!-- Blanco y negro -->
                  <div class="row">

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/byn1.jpg">
                              <img class="img-fluid" src="images/lasala/byn1.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/byn2.jpg">
                              <img class="img-fluid" src="images/lasala/byn2.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/byn3.jpg">
                              <img class="img-fluid" src="images/lasala/byn3.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/byn4.jpg">
                              <img class="img-fluid" src="images/lasala/byn4.jpg" alt=" ">
                          </a>
                      </div>

                  </div>

                  <!-- Rojo -->
                  <div class="row">

                    <div class="col-md-6">

                      <div class="row columna-fotos">

                          <div class="col-md-6">
                            <a class="lightbox" href="images/lasala/rojo1.jpg">
                                <img class="img-fluid" src="images/lasala/rojo1.jpg" alt=" ">
                            </a>
                          </div>

                          <div class="col-md-6">
                            <a class="lightbox" href="images/lasala/rojo2.jpg">
                                <img class="img-fluid" src="images/lasala/rojo2.jpg" alt=" ">
                            </a>
                          </div>

                      </div>

                      <div class="row columna-fotos">

                          <div class="col">
                            <a class="lightbox" href="images/lasala/rojo3.jpg">
                              <img class="img-fluid" src="images/lasala/rojo3.jpg">
                            </a>
                          </div>

                          <div class="col">
                            <a class="lightbox" href="images/lasala/rojo4.jpg">
                              <img class="img-fluid" src="images/lasala/rojo4.jpg">
                            </a>
                          </div>

                      </div>

                    </div>

                    <!-- Destacada -->
                    <div class="col-md-6">
                        <a class="lightbox" href="images/lasala/rojo5.jpg">
                            <img class="img-fluid" src="images/lasala/rojo5.jpg" alt=" ">
                        </a>
                    </div>




                  </div>

                  <!-- Liv -->
                  <div class="row">

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/liv1.jpg">
                              <img class="img-fluid" src="images/lasala/liv1.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/liv2.jpg">
                              <img class="img-fluid" src="images/lasala/liv2.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/liv3.jpg">
                              <img class="img-fluid" src="images/lasala/liv3.jpg" alt=" ">
                          </a>
                      </div>

                      <div class="col-12 col-md-3">
                          <a class="lightbox" href="images/lasala/liv4.jpg">
                              <img class="img-fluid" src="images/lasala/liv4.jpg" alt=" ">
                          </a>
                      </div>

                  </div>

                  <!-- Verde -->
                  <div class="row">

                    <div class="col-md-6">
                        <a class="lightbox" href="images/lasala/verde1.jpg">
                            <img class="img-fluid" src="images/lasala/verde1.jpg" alt=" ">
                        </a>
                      </div>

                    <div class="col-md-6">


                      <div class="row columna-fotos">

                          <div class="col-md-6">
                            <a class="lightbox" href="images/lasala/verde2.jpg">
                                <img class="img-fluid" src="images/lasala/verde2.jpg" alt=" ">
                            </a>
                          </div>

                          <div class="col-md-6">
                            <a class="lightbox" href="images/lasala/verde3.jpg">
                                <img class="img-fluid" src="images/lasala/verde3.jpg" alt=" ">
                            </a>
                          </div>

                      </div>

                      <div class="row columna-fotos">

                          <div class="col">
                            <a class="lightbox" href="images/lasala/verde4.jpg">
                              <img class="img-fluid" src="images/lasala/verde4.jpg">
                            </a>
                          </div>

                          <div class="col">
                            <a class="lightbox" href="images/lasala/verde5.jpg">
                              <img class="img-fluid" src="images/lasala/verde5.jpg">
                            </a>
                          </div>

                      </div>

                    </div>






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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
  <script type="text/javascript">
    $(window).on('load', function () {
       // setTimeout(function () {
      $(".loader-page").css({visibility:"hidden",opacity:"0"})
    //}, 2000);

  });
  </script>
  <script>
      baguetteBox.run('.tz-gallery');
  </script>
</body>
</html>
