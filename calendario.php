<!DOCTYPE html>
        <html>
<head>
<!--boostrap css-->
    <script src="js/Funciones.js"></script>
    <script src="js/jquery.min.js"></script>

    <script src="js/moment.min.js"></script>

    <!-- Full Calendar -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/estiloscalendario.css">
    <script src="js/funcioncalendario.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/es.js"></script>

        </head>
<body>

<?php

        //hacer consulta a la bbdd y guardar en variables

        include "../../includes/mmbox/conexion.inc";

        $sql = "SELECT * FROM eventos WHERE estEVENT='PUBLICADO' OR estEVENT='AGOTADO' OR estEVENT='SUSPENDIDO' ORDER BY startdateEVENT, starttimeEVENT";

        $result = mysqli_query($conex,$sql);

        //die($sql);

?>

        <script>



          // alert(cadena.length);

        $(document).ready(function(){
                $('#calendarioweb').fullCalendar({



                    height: 'auto',

                    header:{
                        left:'prev',
                        center:'title',
                        right:'next'
                    },

                    views: {
                      month: { // name of view
                        titleFormat: 'MMMM YYYY',
                        columnHeaderFormat: 'dd'
                        // other view-specific options here
                      }
                    },

                    events:[  <?php

                              if (mysqli_num_rows($result)==0) {
                                 $estado= "no anda";
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
                                        $estado="tengo algo";


                                        //concatenar fecha y hora para mostrar

                                        $inicio = $iniciodate;
                                        $fin    = $findate;

                                        //concatenar id para mandarlo por GET

                                        $idget = "evento.php?ID=".$id;

                                        //echo "$id $tit $desc $inicio $fin $estad $categ $e";
                                        echo "{title:'$tit',start:'$inicio',end:'$fin',url:'$idget',rendering:'background'},";
                                    }//endwhile
                                }//endif

                     ?>],

                            dayClick: function(date, allDay, jsEvent, view) {
                            window.location='fechaEvento.php?FECHA='+date.format();
                         }



                });




        });


    </script>



    <div id="calendarioweb"></div>

        </body>
        </html>
