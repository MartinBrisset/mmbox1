<?php
    // PROCESO PERSONAS LOG (login)

    // conectar al Servidor
    include "../../includes/mmbox/conexion.inc";
    // capturar datos del formulario
    $usuario = ($_POST["USR"]);
    $password= md5($_POST["PSW"]);
    // verificar existencia
    $sql = "SELECT * FROM usuarios WHERE nomUSR='$usuario' AND paswUSR='$password'";
    //die($sql);
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    if (mysqli_num_rows($result)==0) {
        // mensaje de error
        //die($sql);
        header("Location: entrar/error.php");

    }else{
        // crear variable de sesión
        session_start();
        $_SESSION["user"]=$usuario;
        header("Location: indexUsr.php");
    }


?>
