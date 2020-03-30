<?php
    // PROCESO PERSONAS UPD

    // conectar al Servidor de Base de Datos
    include "../../includes/mmbox/conexion.inc";

    //controlar la sesion a traves del ID
    session_start();
    if (!isset($_SESSION["idusuario"])) {
        // enviar mensaje de error
        header("Location: errorPage.php?MSG=debe inciar sesión");
    } // endif
    //cargar el id a la variable
    $id      = $_SESSION["idusuario"];
    $usuario = $_SESSION["user"];

    // capturar datos del formulario
    $password       = md5($_POST["PASW"]);
    $autor          = $_POST["AUTOR"];
    $perfil         = $_POST["PERF"];

    // crear sentencia SQL para modificación
    $sql  = "UPDATE usuarios SET ";
    $sql .= "nomUSR='$usuario',";
    $sql .= "paswUSR='$password',";
    $sql .= "autorUSR='$autor',";
    $sql .= "perfUSR=$perfil ";
    $sql .= "WHERE idUSR=$id";

    //die($sql);
    // ejecutar sentencia SQL
    mysqli_query($conex,$sql);
    // cerrar conexión
    mysqli_close($conex);

    //cargar datos nuevos en las sesiones
    $_SESSION["autor"] = $autor;

    // volver automáticamente al formulario de UPD (redirigir)
    header("Location: MisDatos.php");
?>
