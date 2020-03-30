<?php

	include "../../includes/mmbox/conexion.inc";

	 //CAMBIA EL ESTADO DE LOS EVENTOS SEGUN LA FECHA DE FORMA AUTOMATICA

   //captura fecha y ahora actual
   date_default_timezone_set("America/Argentina/Buenos_Aires");

   $fecha = date('Y-m-d');

   //a la fecha le resta 1 día
   $fecha--;

   //echo "$fecha";

   //pedir datos al servidor (filtra por fecha, toma la fecha de hoy, le resta 1 dia y trae los registros desde esa fecha hacia atras)


   $sql = "SELECT * FROM eventos WHERE startdateEVENT < '$fecha'";
    // ejecutar sentencia SQL
    //die($sql);
    $result = mysqli_query($conex,$sql);

    //buscar resultados
    if (mysqli_num_rows($result)) {
    	//cargar registro
    	while ($regEVENT=mysqli_fetch_array($result)) {
    		//mientras tenga resultados lo guardo en variables
    		$id             = $regEVENT["idEVENT"];
    		$iniciofecha    = $regEVENT["startdateEVENT"];

    		//echo "$iniciofecha,$id";

    		//crear sentencia sql para darle de baja a todos los eventos viejos

    		$sql = "UPDATE eventos SET estEVENT='DE BAJA',bannerEVENT='NO-VISIBLE' WHERE idEVENT='$id'";
    		//ejecturar sentencia
		    //die($sql);
		    mysqli_query($conex,$sql);
    	}//endwile
    }//endif
?>
