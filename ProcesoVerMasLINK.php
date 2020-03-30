<?php
    // PROCESO PERSONAS LOG (login)

    // conectar al Servidor
    include "../../includes/mmbox/conexion.inc";
    // capturar el ID del evento
    $idEVENTO = $_GET["ID"];
    // crear sentencia SQL para buscar persona
    $sql = "SELECT * FROM eventos WHERE idEVENT='$idEVENTO'";
    //die($sql);
    // ejectuar sentencia SQL
    $result = mysqli_query($conex,$sql);
    // obtener registro
    $regEVENT = mysqli_fetch_array($result);
    // preparar resultado
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
    // devolver resultado
    echo $link;
    // cerrar conexión
    mysqli_close($conex);

?>
