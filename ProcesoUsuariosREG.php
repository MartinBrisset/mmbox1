<?php
    // PROCESO PERSONAS REG (registro como usuario)

    include "includes/CtrlSession.inc";

    // conectar al Servidor
    include "../../includes/mmbox/conexion.inc";
    // capturar datos del formulario
    $usuario = $_POST["USR"];
    $password= md5($_POST["PASW"]);
    $perfil  = $_POST["PERF"];

    // verificar existencia
    $sql = "SELECT * FROM usuarios WHERE nomUSR='$usuario'";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    if (mysqli_num_rows($result)==0) {
        // crear sentencia SQL
        $sql  = "INSERT INTO usuarios ";
        $sql .= "(idUSR,nomUSR,paswUSR,perfUSR) ";
        $sql .= "VALUES ";
        $sql .= "(null,'$usuario','$password','$perfil') ";
        // ejecutar sentencia SQL
        //die($sql);
        mysqli_query($conex,$sql);
        // cerrar conexión
        mysqli_close($conex);
        // enviar mensaje
        header("Location: MensajeUSRPage.php?MSG=Nuevo usuario creado");
    } else {
        // mensaje de error
        header("Location: errorPage.php?MSG=Usuario existente");
    } // endif



?>
