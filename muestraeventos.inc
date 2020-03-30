       <?php
            // conectar al Servidor de Base de Datos
            include "../../includes/mmbox/conexion.inc";

            //captura fecha y ahora actual
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            //$fechahora = date('Y-m-d H:i:s');
              $fecha = date('Y-m-d');
              //echo "$fecha";

           //mostrar todos los eventos siguientes
            $sql  = "SELECT * ";
            $sql .= "FROM eventos ";
            $sql .= "WHERE estEVENT='PUBLICADO' OR estEVENT='SUSPENDIDO' OR estEVENT='AGOTADO' OR estEVENT='PROXIMAMENTE' AND startdateEVENT>=$fecha ORDER BY startdateEVENT ASC LIMIT 5"; //Ordena los eventos para mostrar, del mas reciente al menos reciente. solo los primeros 5
            // ejecutar sentencia SQL
            //die($sql);
            $result = mysqli_query($conex,$sql);
            // controlar existencia de datos
            if (mysqli_num_rows($result)==0) {
                die("todavía no existen eventos o no hay evento para el filtro seleccionado");
            } // endif
            // recorrer matríz y mostrar eventos
            $fila = 1;
            while ($regEVENT=mysqli_fetch_array($result)) {
                // cargar registro
                $id             = $regEVENT["idEVENT"];
                $titulo         = $regEVENT["titEVENT"];
                $iniciodate     = $regEVENT["startdateEVENT"];
                $iniciotime     = $regEVENT["starttimeEVENT"];
                $findate        = $regEVENT["enddateEVENT"];
                $fintime        = $regEVENT["endtimeEVENT"];
                $linkventa      = $regEVENT["linkEVENT1"];
                $estado         = $regEVENT["estEVENT"];

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

                if ($estado == "PROXIMAMENTE") {
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
                        <i class='fas fa-ticket-alt ticket d-none d-sm-none d-md-none d-lg-block'></i>
                    </div>
                </a>
                  ";
                $fila++;
            } // end while
            // cerrar conexión
            mysqli_close($conex);
       ?>
