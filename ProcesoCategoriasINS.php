<?php
    // PROCESO PERSONAS REG (registro como usuario)

    include "includes/CtrlSession.inc";

    // conectar al Servidor
    include "../../includes/mmbox/conexion.inc";
    // capturar datos del formulario
    $nombre = $_POST["NAME"];
    // verificar existencia
    $sql = "SELECT * FROM categorias WHERE nomCAT='$nombre'";
    // ejecutar sentencia SQL
    $result = mysqli_query($conex,$sql);
    if (mysqli_num_rows($result)==0) {
        // crear sentencia SQL
        $sql  = "INSERT INTO categorias ";
        $sql .= "(idCAT,nomCAT) ";
        $sql .= "VALUES ";
        $sql .= "(null,'$nombre') ";
        // ejecutar sentencia SQL
        //die($sql);
        mysqli_query($conex,$sql);
        // cerrar conexión
        mysqli_close($conex);
        // enviar mensaje
        header("Location: MensajeCatPage.php?&MSG=Nueva categoría creada con éxito.");
    } else {
        // mensaje de error
        header("Location: errorCatPage.php?MSG=Categoría ya existente.");
    } // endif



?>
