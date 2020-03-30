<?php
    // PROCESO NOTICIAS INS (Agregar nueva noticia)

    // Controlar sesion
    include "includes/CtrlSession.inc";

    // conectar al Servidor
    include "../../includes/mmbox/conexion.inc";
    // capturar datos del formulario que escribio el cliente y convertir caracteres
    $titEvento          = $_POST["TIT"];
    $descEvento         = $_POST["DESC"];
    $fechaInicio        = $_POST["FECHASTART"];
    $horaInicio         = $_POST["HORASTART"];
    $fechaFin           = $_POST["FECHAEND"];
    $horaFin            = $_POST["HORAEND"];
    $estadoEvento       = $_POST["EST"];
    $categoriaEvento    = $_POST["CAT"];
    //$checkEvento        = $_POST["CHECK"];
    $salaCheck          = $_POST["SALA"];
    $nameLink1          = $_POST["NAMELINK1"];
    $linkEvento1        = $_POST["LINK1"];
    $nameLink2          = $_POST["NAMELINK2"];
    $linkEvento2        = $_POST["LINK2"];
    $nameLink3          = $_POST["NAMELINK3"];
    $linkEvento3        = $_POST["LINK3"];
    $namePrecioEvento1  = $_POST["NAMEPRECIO1"];
    $precioEvento1      = $_POST["PRECIO1"];
    $namePrecioEvento2  = $_POST["NAMEPRECIO2"];
    $precioEvento2      = $_POST["PRECIO2"];
    $namePrecioEvento3  = $_POST["NAMEPRECIO3"];
    $precioEvento3      = $_POST["PRECIO3"];
    $namePrecioEvento4  = $_POST["NAMEPRECIO4"];
    $precioEvento4      = $_POST["PRECIO4"];
    $namePrecioEvento5  = $_POST["NAMEPRECIO5"];
    $precioEvento5      = $_POST["PRECIO5"];

    if (isset ($_POST["CHECK"])) {
        $checkEvento    = $_POST["CHECK"];
    } else{
        $checkEvento    = "";
    }


    //cargar datos desde sesion
    $autor = $_SESSION["user"];

    //echo "$titEvento,$descEvento,$fechaInicio,$horaInicio,$fechaFin,$horaFin,$estadoEvento,$categoriaEvento,$checkEvento,$linkEvento1,$linkEvento2,$linkEvento3";
    //echo "$salaCheck";

     // verificar existencia de la noticia (busca en la base el mismo titulo y la misma fecha)
    $sql = "SELECT * FROM eventos WHERE titEVENT='$titEvento' AND startdateEVENT='$fechaInicio'";
    // ejecutar sentencia SQL
    //die($sql);
    $result = mysqli_query($conex,$sql);
    if (mysqli_num_rows($result)==1) {
        // mensaje de error
        //die($sql);
        header("Location: mensajePage.php?MSG=Existe un evento con el mismo nombre ese día");
    } else {
        // si la noticia no existe la crea y guarda en la base
        // crear sentencia sql para ingresar datos a la base
        // ingresar datos a la tabla de eventos
        $sql  = "INSERT INTO eventos ";
        $sql .= "(idEVENT,titEVENT,descEVENT,startdateEVENT,starttimeEVENT,enddateEVENT,endtimeEVENT,estEVENT,catEVENT,autorEVENT,bannerEVENT,salaEVENT,nameLinkEVENT1,linkEVENT1,nameLinkEVENT2,linkEVENT2,nameLinkEVENT3,linkEVENT3,namePrecioEVENT1,precioEVENT1,namePrecioEVENT2,precioEVENT2,namePrecioEVENT3,precioEVENT3,namePrecioEVENT4,precioEVENT4,namePrecioEVENT5,precioEVENT5) ";
        $sql .= "VALUES ";
        $sql .= "(null,'$titEvento','$descEvento','$fechaInicio','$horaInicio','$fechaFin','$horaFin','$estadoEvento','$categoriaEvento','$autor','$checkEvento','$salaCheck','$nameLink1','$linkEvento1','$nameLink2','$linkEvento2','$nameLink3','$linkEvento3','$namePrecioEvento1','$precioEvento1','$namePrecioEvento2','$precioEvento2','$namePrecioEvento3','$precioEvento3','$namePrecioEvento4','$precioEvento4','$namePrecioEvento5','$precioEvento5')";
        //die($sql);
        //  ejecutar sentencia SQL
        mysqli_query($conex,$sql);
        } // endif

    // tomar dato principal para ingresar las imagenes
    // titulo y la fecha ya que no se puede repetir, busca por el titulo y la fecha que se acaba de ingresar, y toma el ID

       $sql = "SELECT * FROM eventos WHERE titEVENT='$titEvento' AND startdateEVENT='$fechaInicio'";

              //ejecutar sentencia SQL
             //die($sql);
              $result=mysqli_query($conex,$sql);

              // capturar ID de la noticia
             if (mysqli_num_rows($result)==0) {
                      die("Error al subir el evento, por favor no utilizar carácteres extraños como < > / ' ");
                  } // endif
                  // recorrer matríz y mostrar noticias
                      while ($regEVENT=mysqli_fetch_array($result)) {
                      // cargar registro
                      $idEvento = $regEVENT["idEVENT"];
                } // endwhile


     // definir carpeta destino para la imagen
    $dir = "imagenes/";
    // controlar subida de archivo imagen principal
        if (is_uploaded_file($_FILES["IMGMAIN"]["tmp_name"])) {
            // cargar nombre temporal
            $fileTMP = $_FILES["IMGMAIN"]["tmp_name"];
            // cargar nombre original
            $nameFILE= basename($_FILES["IMGMAIN"]["name"]) ;
            // convertir nombre para PHP VERSION 7
            $nameBIEN = utf8_decode($nameFILE);
            // crear destino
            $imagenEvento1 = $dir.$idEvento."_Main_".$nameBIEN;
            // mover archivo
            move_uploaded_file($fileTMP,$imagenEvento1);

            } else {
            header("Location: mensajePage.php?MSG=No fue posible subir el archivo imagen principal");
        } // endif
          //ingresar datos a la tabla de imagenes
        $sqlIMG1  = "INSERT INTO imagenes ";
        $sqlIMG1 .= "(idIMG,urlIMG,ideventIMG,catIMG) ";
        $sqlIMG1 .="VALUES ";
        $sqlIMG1 .="(null,'$imagenEvento1','$idEvento','Main')";
        // ejecutar sentencia SQL
        //die($sqlIMG1);
        mysqli_query($conex,$sqlIMG1);
        // controlar subida de archivo imagen secundaria
        if (is_uploaded_file($_FILES["IMGOTHER"]["tmp_name"])) {
            // cargar nombre temporal
            $fileTMP = $_FILES["IMGOTHER"]["tmp_name"];
            // cargar nombre original
            $nameFILE= basename($_FILES["IMGOTHER"]["name"]) ;
            // convertir nombre para PHP VERSION 7
            $nameBIEN = utf8_decode($nameFILE);
            // crear destino
            $imagenEvento2 = $dir.$idEvento."_Other_".$nameBIEN;
            // mover archivo
            move_uploaded_file($fileTMP,$imagenEvento2);

            } else {
            header("Location: mensajePage.php?MSG=No fue posible subir el archivo imagen secundaria");
        } // endif

        //ingresar datos a la tabla de imagenes
        $sqlIMG2  = "INSERT INTO imagenes ";
        $sqlIMG2 .= "(idIMG,urlIMG,ideventIMG,catIMG) ";
        $sqlIMG2 .="VALUES ";
        $sqlIMG2 .="(null,'$imagenEvento2','$idEvento','Other')";
        // ejecutar sentencia SQL
        //die($sqlIMG2);
        mysqli_query($conex,$sqlIMG2);

        // cerrar conexion
        mysqli_close($conex);

         //si el evento no es publico, no mostrar

        if ($estadoEvento=="PUBLICADO" or $estadoEvento=="SUSPENDIDO" or $estadoEvento=="AGOTADO") {
         header("Location: MensajeEventPage.php?ID=$idEvento&MSG=Evento creado exitosamente.");
        }else{
            header("Location: MensajePage.php?MSG=Evento creado exitosamente.");
        }


?>
