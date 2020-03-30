<?php 

		$ruta="imagenes/";
 
		$directorio = opendir($ruta); //ruta actual
		$espacioTotalBytes = 0;
		while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
		{
		    //verificamos si es o no un directorio
		    if (is_dir($archivo)){
		        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
		    }else {
		        //echo $archivo . "<br />";
		        $espacio = filesize("imagenes/$archivo");
		        //echo $espacio." ";
		        $espacioTotalBytes = ($espacioTotalBytes+$espacio);
		    }//endif
		}//endwile
		$pesoWebMegas = 60;

		$espacioIMGMegas = ceil($espacioTotalBytes / 1048576); //redondea y lo pasa a megas

		$espacioTotal=$pesoWebMegas+$espacioIMGMegas;

		//calcular porcentajes

		$capacidadHosting = 30720; // 30 gb en megas

		$porcentajeOcupado = ($espacioTotal *  100) / $capacidadHosting;

		$porcentajeOcupadoRedondeo = round($porcentajeOcupado,0,PHP_ROUND_HALF_UP);

		$porcentajeReal=$porcentajeOcupadoRedondeo+1;

		//calcula porcentaje para la grafica

		if ($porcentajeReal<=5) {
			$porcentajeGrafica=5;
		}elseif ($porcentajeReal >5 && $porcentajeReal <=10 ) {
			$porcentajeGrafica=10;
		}elseif ($porcentajeReal >10 && $porcentajeReal <=15 ) {
			$porcentajeGrafica=15;
		}elseif ($porcentajeReal >15 && $porcentajeReal <=20 ) {
			$porcentajeGrafica=20;
		}elseif ($porcentajeReal >20 && $porcentajeReal <=25 ) {
			$porcentajeGrafica=25;
		}elseif ($porcentajeReal >25 && $porcentajeReal <=30 ) {
			$porcentajeGrafica=30;
		}elseif ($porcentajeReal >30 && $porcentajeReal <=35 ) {
			$porcentajeGrafica=35;
		}elseif ($porcentajeReal >35 && $porcentajeReal <=40 ) {
			$porcentajeGrafica=40;
		}elseif ($porcentajeReal >40 && $porcentajeReal <=45 ) {
			$porcentajeGrafica=45;
		}elseif ($porcentajeReal >45 && $porcentajeReal <=50 ) {
			$porcentajeGrafica=50;
		}elseif ($porcentajeReal >50 && $porcentajeReal <=55 ) {
			$porcentajeGrafica=55;
		}elseif ($porcentajeReal >55 && $porcentajeReal <=60 ) {
			$porcentajeGrafica=60;
		}elseif ($porcentajeReal >60 && $porcentajeReal <=65 ) {
			$porcentajeGrafica=65;
		}elseif ($porcentajeReal >65 && $porcentajeReal <=70 ) {
			$porcentajeGrafica=70;
		}elseif ($porcentajeReal >70 && $porcentajeReal <=75 ) {
			$porcentajeGrafica=75;
		}elseif ($porcentajeReal >75 && $porcentajeReal <=80 ) {
			$porcentajeGrafica=80;
		}elseif ($porcentajeReal >80 && $porcentajeReal <=85 ) {
			$porcentajeGrafica=85;
		}elseif ($porcentajeReal >85 && $porcentajeReal <=90 ) {
			$porcentajeGrafica=90;
		}elseif ($porcentajeReal >90 && $porcentajeReal <=95 ) {
			$porcentajeGrafica=95;
		}else{
			$porcentajeGrafica = 100;
		}

		//echo $porcentajeGrafica."porcentraje grafico";
		//echo "porcentaje ocupado ".$porcentajeReal;



		//echo "la cantidad de archivos de mierda son".$archivos."archivos";
		//echo "Los archivos de mierda pesan ".$espacioTotalBytes." Bytes del orto";
		//echo "Los archivos de mierda pesan ".$espacioIMGMegas." megas del orto";
		//echo "Los archivos de mierda pesan ".$espacioTotal." megas del orto";

?>