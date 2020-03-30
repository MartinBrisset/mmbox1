<?php
    // PROCESO ACTUALIZAR EVENTO

    //controlar sesion
    include "includes/CtrlSession.inc";

    // conectar al Servidor de Base de Datos
    include "../../includes/mmbox/conexion.inc";

    //captura dato por GET
    $evento = $_GET["ID"];
    //echo "el id es $evento";

    //captura dato de la sesion
    $autor = $_SESSION["user"];
   
    //crea la sentencia sql para dar de baja el evento
    $sql = "SELECT * FROM eventos WHERE idEVENT=$evento";
    //ejecutar sentencia sql
    mysqli_query($conex,$sql);
    
    //carga la variable y hace la sentencia de dar la baja
    $sql2="UPDATE eventos SET estEVENT='DE BAJA',bannerEVENT='NO-VISIBLE' WHERE idEVENT='$evento'";
    //ejecutar sentencia
    //die($sql2);
    mysqli_query($conex,$sql2);
      
    // cerrar conexion
    mysqli_close($conex);

    header("Location: administracion.php");


?>
