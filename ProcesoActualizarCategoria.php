<?php
    // PROCESO ACTUALIZAR EVENTO

    //controlar sesion
    include "includes/CtrlSession.inc";

    // conectar al Servidor de Base de Datos
    include "../../includes/mmbox/conexion.inc";

    //captura datos por POST
    $nombre = ($_POST["NAME"]);
    //captura dato de la sesion
    $id     = $_SESSION["idcategoria"];


    //echo $id, $nombre;

    //verificar si la categoria ya existe
    $sql = "SELECT * FROM categorias WHERE nomCAT='$nombre'";
    $result=mysqli_query($conex,$sql);
     if (mysqli_num_rows($result)==1) {
        // mensaje de error
        //die($sql);
        header("Location: errorCatPage.php?MSG=Ya existe una categoria con ese nombre");
    } else {
        //tomar nombre anterior de la categoria y guardardo en una variable
        $sqlNombre = "SELECT * FROM categorias WHERE idCAT='$id'";
        //ejecutar sql
        $resultadoNombre = mysqli_query($conex,$sqlNombre);
        //die($sqlNombre);
        while ($regNombre = mysqli_fetch_array($resultadoNombre)) {
            $idCat = $regNombre["idCAT"];
            $nomCat = $regNombre["nomCAT"];
        }//enwile
        //crear sentencia sql para modificar en la table categorias
       $sql = "UPDATE categorias SET nomCAT='$nombre' WHERE idCAT='$id'";
        //ejecturar sentencia
       //die($sql);
        mysqli_query($conex,$sql);
        //modificar todos los eventos que tienen esa categoria
        //buscar todos los eventos
        $sqlEvento = "SELECT * FROM eventos WHERE catEVENT='$nomCat'";
        $resultEvento =mysqli_query($conex,$sqlEvento);
        //die($sqlEvento);
        if (mysqli_num_rows($resultEvento)) {
            while ($regEVENT=mysqli_fetch_array($resultEvento)) {
                $idEvento  = $regEVENT["idEVENT"];
                $catEvento = $regEVENT["catEVENT"];

                //modifica los eventos
                $sqlEvento2 = "UPDATE eventos SET catEVENT='$nombre' WHERE idEVENT='$idEvento'";
                //ejecturar sentencia
                //die($sqlEvento2);
                mysqli_query($conex,$sqlEvento2);
            }
        }
        // cerrar conexion
        mysqli_close($conex);
        header("Location: MensajeCatPage.php?ID=$id&MSG=Categoria Actualizada.");
    }


?>
