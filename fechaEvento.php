<?php
//PROCESO BUSCAR EVENTOS

//conectar al servidor
include "../../includes/mmbox/conexion.inc";

  //capturar variable por get

  $fecha= $_GET["FECHA"];


  //echo "La puta fecha es $fecha";

  //captura fecha y ahora actual
 // date_default_timezone_set("America/Argentina/Buenos_Aires");
  //$fechahora = date('Y-m-d H:i:s');
  //$fecha = date('Y-m-d');
  //echo "$fecha";

  //crear consulta para verificar existencia de eventos en esa fecha

  //$sql = "SELECT * FROM eventos WHERE startdateEVENT='$fecha'";
  $sql = "SELECT * FROM eventos WHERE startdateEVENT='$fecha' AND (estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE') ORDER BY startdateEVENT ASC";
  //die($sql);

  $result = mysqli_query($conex,$sql);

  if (mysqli_num_rows($result)==0) {
      //echo "sos tremendo puto";
      header("Location: index.php#calendarioweb");
  }elseif (mysqli_num_rows($result)>=1) {
    if (mysqli_num_rows($result)==1) {
      $regEVENT=mysqli_fetch_array($result);
      $id = $regEVENT["idEVENT"];
      header("Location: evento.php?ID=$id");
    }else{
      $fila = 1;
      echo "
                  <!DOCTYPE html>
                 <head>
                   <meta charset='utf-8'>
                   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                   <title>Montevideo Music Box</title>
                   <meta name='keywords' content='montevideo, music, box, mmbox, lachina, rock, sala, concierto'>
                   <meta  name='description' content='Montevideo Music Box'>
                   <meta name='viewport' content='width=device-width, initial-scale=1'>

                   <!-- Bootstrap CSS -->
                   <link rel='stylesheet' href='css/bootstrap.css'>
                   <link rel='stylesheet' href='css/estilo.css'>

                   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.0/css/all.css' integrity='sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h' crossorigin='anonymous'>

                   <!-- styles for video player -->
                   <link rel='stylesheet' href='source/style.css'>
                 </head>


                <body>

                    <!-- Filtro -->
                    <div class='filtro'>
                    </div>

                    <!-- Contenedor -->
                    <div class='container' id='contenedor'>

                      //<!-- Menu -->
                     "; 
                          include 'includes/menugral.inc';
                    echo "
                      <!-- Eventos -->
                      <div class='col-12' id='columna-eventos-mismo-dia'>
                        <div class='row'>
                     ";

            while ($regEVENT=mysqli_fetch_array($result)) {
                // cargar registro
                $id             = $regEVENT["idEVENT"];
                $titulo         = $regEVENT["titEVENT"];
                $iniciodate     = $regEVENT["startdateEVENT"];
                $iniciotime     = $regEVENT["starttimeEVENT"];
                $findate        = $regEVENT["enddateEVENT"];
                $fintime        = $regEVENT["endtimeEVENT"];
                $linkventa      = $regEVENT["linkEVENT1"];

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

                  //if ($iniciodate==$fecha) {
                  echo "

                  <a href='$idget' class='col-12 col-md-6 evento-mismo-dia'>
                    <div>

                      <img class='img-fluid' src='$mainImagen'/>

                      <div class='degradado d-flex align-items-center evento-mismo-dia-titulo'>
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
                      </div>

                    </div>
                  </a>
                    ";
                  $fila++;
                 
            } // end while
            // cerrar conexión
            mysqli_close($conex);
    }
  }



?>


<!-- Footer -->
          <?php include "includes/footer.inc"; ?>


        </div> <!-- fin row -->
    </div> <!-- fin container -->



<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
