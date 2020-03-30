<?php
    // PROCESO ACTUALIZAR EVENTO

    //controlar sesion
    include "includes/CtrlSession.inc";

    // conectar al Servidor de Base de Datos
    include "../../includes/mmbox/conexion.inc";

    //captura datos por POST
    $titEvento          = ($_POST["TIT"]);
    $descEvento         = ($_POST["DESC"]);
    $fechaInicio        = ($_POST["FECHASTART"]);
    $horaInicio         = ($_POST["HORASTART"]);
    $fechaFin           = ($_POST["FECHAEND"]);
    $horaFin            = ($_POST["HORAEND"]);
    $estadoEvento       = ($_POST["EST"]);
    $categoriaEvento    = ($_POST["CAT"]);
    //$checkEvento        = ($_POST["CHECK"]);
    $salaCheck          = ($_POST["SALA"]);
    $nameLink1          = ($_POST["NAMELINK1"]);
    $linkEvento1        = ($_POST["LINK1"]);
    $nameLink2          = ($_POST["NAMELINK2"]);
    $linkEvento2        = ($_POST["LINK2"]);
    $nameLink3          = ($_POST["NAMELINK3"]);
    $linkEvento3        = ($_POST["LINK3"]);
    $namePrecioEvento1  = ($_POST["NAMEPRECIO1"]);
    $precioEvento1      = ($_POST["PRECIO1"]);
    $namePrecioEvento2  = ($_POST["NAMEPRECIO2"]);
    $precioEvento2      = ($_POST["PRECIO2"]);
    $namePrecioEvento3  = ($_POST["NAMEPRECIO3"]);
    $precioEvento3      = ($_POST["PRECIO3"]);
    $namePrecioEvento4  = ($_POST["NAMEPRECIO4"]);
    $precioEvento4      = ($_POST["PRECIO4"]);
    $namePrecioEvento5  = ($_POST["NAMEPRECIO5"]);
    $precioEvento5      = ($_POST["PRECIO5"]);

    //captura dato de la sesion
    $autor = $_SESSION["user"];
    $id    = $_SESSION["idevento"];

    //verificar check
    if (isset($_POST["CHECK"])) {
        $checkEvento = "destacado";
     }else{
        $checkEvento = "";
    }

    //echo "$id,$autor,$titEvento,$descEvento,$fechaInicio,$horaInicio,$fechaFin,$horaFin,$estadoEvento,$categoriaEvento,$checkEvento,$salaCheck,$nameLink1,$linkEvento1,$nameLink2,$linkEvento2,$nameLink3,$linkEvento3,namePrecioEvento1,$precioEvento1,namePrecioEvento2,$precioEvento2,$namePrecioEvento3,$precioEvento3,namePrecioEvento4,$precioEvento4,namePrecioEvento5,$precioEvento5";

    //actualizar evento, primero en la tabla de eventos

    //buscar que el evento al modificarlo, no coincida el dia y la hora con otro evento

    //crear sentencia sql
   $sql = "UPDATE eventos SET titEVENT='$titEvento',descEVENT='$descEvento',startdateEVENT='$fechaInicio',starttimeEVENT='$horaInicio',enddateEVENT='$fechaFin',endtimeEVENT='$horaFin',estEVENT='$estadoEvento',catEVENT='$categoriaEvento',autorEVENT='$autor',bannerEVENT='$checkEvento',salaEVENT='$salaCheck',nameLinkEVENT1='$nameLink1',linkEVENT1='$linkEvento1',nameLinkEVENT2='$nameLink2',linkEVENT2='$linkEvento2',nameLinkEVENT3='$nameLink3',linkEVENT3='$linkEvento3',namePrecioEVENT1='$namePrecioEvento1',precioEVENT1='$precioEvento1',namePrecioEVENT2='$namePrecioEvento2',precioEVENT2='$precioEvento2',namePrecioEVENT3='$namePrecioEvento3',precioEVENT3='$precioEvento3',namePrecioEVENT4='$namePrecioEvento4',precioEVENT4='$precioEvento4',namePrecioEVENT5='$namePrecioEvento5',precioEVENT5='$precioEvento5' WHERE idEVENT='$id'";
    //ejecturar sentencia
   //die($sql);
    mysqli_query($conex,$sql);

    //verificar si tambien subio una foto, busca la anterior y la borra
     if (is_uploaded_file($_FILES["IMGMAIN"]["tmp_name"])) {
            //buscar dato en la base
            $sqlimgdelete = "SELECT * FROM imagenes WHERE ideventIMG='$id' AND catIMG='Main'";
            //ejecturar sentencia
            //die($sqlimgdelete);
            $result=mysqli_query($conex,$sqlimgdelete);
            //si encuentra la foto
            if (mysqli_num_rows($result)==1) {
            // recorre matriz y borra la imagen de la carpeta
                  while ($regIMG=mysqli_fetch_array($result)) {
                      // cargar registro
                      $rutaImagen = $regIMG["urlIMG"];
                     } // endwhile
                //borrar imagen
                unlink($rutaImagen);
             }//endif

             //ingresar nueva imagen
            //capturar ruta
            $dir = "imagenes/";
            // cargar nombre temporal
            $fileTMP = $_FILES["IMGMAIN"]["tmp_name"];
            // cargar nombre original
            $nameFILE= basename($_FILES["IMGMAIN"]["name"]) ;
            // convertir nombre para PHP VERSION 7
            $nameBIEN = utf8_decode($nameFILE);
            // crear destino
            $imagenEvento = $dir.$id."_Main_".$nameBIEN;
            // mover archivo
            move_uploaded_file($fileTMP,$imagenEvento);

            //buscar en la base para capturar el id

            $sqlimgUPD = "SELECT * FROM imagenes WHERE ideventIMG='$id' AND catIMG='Main'";
            //ejecturar setencia
            //die($sqlimgUPD);
            $result=mysqli_query($conex,$sqlimgUPD);
            //capturar el id
            if (mysqli_num_rows($result)==1) {
                //recorre matriz y captura id
                while ($regIMGUPD=mysqli_fetch_array($result)) {
                    //cargar registro
                    $idimagenUPD = $regIMGUPD["idIMG"];
                }//end wile

             //modificar la tabla
             $sqlIMG  = "UPDATE imagenes SET ";
             $sqlIMG .= "urlIMG='$imagenEvento',";
             $sqlIMG .= "ideventIMG='$id',";
             $sqlIMG .= "catIMG='Main'";
             $sqlIMG .= "WHERE idIMG='$idimagenUPD'";
            // ejecutar sentencia SQL
            //die($sqlIMG);
            mysqli_query($conex,$sqlIMG);
            }else{
            //Si no tenia imagen hace el insert
            //ingresar dato a la tabla
            $sqlIMG  = "INSERT INTO imagenes ";
            $sqlIMG .= "(idIMG, urlIMG, ideventIMG, catIMG)";
            $sqlIMG .= "VALUES ";
            $sqlIMG .= "(null,'$imagenEvento','$id','Main')";
            //die($sqlIMG);
            mysql_query($conex,$sqlIMG);
        }//endif
    }//end if

    // controlar subida de archivo imagen secundariaa
     if (is_uploaded_file($_FILES["IMGOTHER"]["tmp_name"])) {
            //buscar dato en la base
            $sqlimgdelete = "SELECT * FROM imagenes WHERE ideventIMG='$id' AND catIMG='Other'";
            //ejecturar sentencia
            //die($sqlimgdelete);
            $result=mysqli_query($conex,$sqlimgdelete);
            //si encuentra la foto
            if (mysqli_num_rows($result)==1) {
            // recorre matriz y borra la imagen de la carpeta
                  while ($regIMG=mysqli_fetch_array($result)) {
                      // cargar registro
                      $rutaImagen = $regIMG["urlIMG"];
                     } // endwhile
                //borrar imagen
                unlink($rutaImagen);
             }//endif

             //ingresar nueva imagen
            //capturar ruta
            $dir = "imagenes/";
            // cargar nombre temporal
            $fileTMP = $_FILES["IMGOTHER"]["tmp_name"];
            // cargar nombre original
            $nameFILE= basename($_FILES["IMGOTHER"]["name"]) ;
            // convertir nombre para PHP VERSION 7
            $nameBIEN = utf8_decode($nameFILE);
            // crear destino
            $imagenEvento = $dir.$id."_Other_".$nameBIEN;
            // mover archivo
            move_uploaded_file($fileTMP,$imagenEvento);

            //buscar en la base para capturar el id

            $sqlimgUPD = "SELECT * FROM imagenes WHERE ideventIMG='$id' AND catIMG ='Other'";
            //ejecturar setencia
            //die($sqlimgUPD);
            $result=mysqli_query($conex,$sqlimgUPD);
            //capturar el id
            if (mysqli_num_rows($result)==1) {
                //recorre matriz y captura id
                while ($regIMGUPD=mysqli_fetch_array($result)) {
                    //cargar registro
                    $idimagenUPD = $regIMGUPD["idIMG"];
                }//end wile
                //modificar la tabla
             $sqlIMG  = "UPDATE imagenes SET ";
             $sqlIMG .= "urlIMG='$imagenEvento',";
             $sqlIMG .= "ideventIMG='$id',";
             $sqlIMG .= "catIMG='Other'";
             $sqlIMG .= "WHERE idIMG='$idimagenUPD'";
            // ejecutar sentencia SQL
            //die($sqlIMG);
            mysqli_query($conex,$sqlIMG);
            }else{
            //Si no tenia imagen hace el insert
            //ingresar dato a la tabla
            $sqlIMG  = "INSERT INTO imagenes ";
            $sqlIMG .= "(idIMG, urlIMG, ideventIMG, catIMG)";
            $sqlIMG .= "VALUES ";
            $sqlIMG .= "(null,'$imagenEvento','$id','Other')";
            //die($sqlIMG);
            mysqli_query($conexion,$sqlIMG);
            }//endif
    }//end if
        // cerrar conexion
        mysqli_close($conex);

        //si el evento no es publico, no mostrar

        if ($estadoEvento=="PUBLICADO" or $estadoEvento=="SUSPENDIDO" or $estadoEvento=="AGOTADO") {
         header("Location: MensajeEventPage.php?ID=$id&MSG=Evento actualizado exitosamente.");
        }else{
            header("Location: MensajePage.php?MSG=Evento actualizado exitosamente.");
        }





?>
