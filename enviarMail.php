<?php

	$textoMail=$_POST["comentarios"];

	$correoPersona=$_POST["email"];

	$asunto=$_POST["asunto"];

	$nombre=$_POST["nombre"];

	$tel=$_POST["tfno"];

	$destinario="contacto@montevideomusicbox.com.uy";

	$headers="MIME-Version: 1.0\r\n";

	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";

	$headers.="From:Mensaje enviado desde la web<contacto@montevideomusicbox.com.uy>\r\n";

	//Armar correo

	$mensaje="

	<body style='background-color: #eaeced;'>

		<div style='padding: 30px;'>
			<div class='row'>
				<div class='col-12' style='background-color: white;'>
					<div class='row'>

					<!-- Header -->
					 <div style='background-color: #007bff; color: white; padding: 20px 30px;'>
						 <p>De<b style='margin-left: 50px'>$nombre</b><p>
						 <p>Mail <b style='margin-left: 36px, color: white;'>$correoPersona</b><p>
						 <p>Celular <b style='margin-left: 18px'>$tel</b><p>
					 </div>

					 <!-- Body -->
					 <div style='background-color: white; padding: 30px;'>
						 <p>$textoMail<p>
					 </div>

					 <!-- Footer -->
					 <div style='border-top: 2px solid #eaeced; background-color: white; padding: 30px;'>
						 <p class='text-secondary'>Responder a <b class='text-primary'>$correoPersona</b><p>
					 </div>

			 </div>
			</div>
		</div>

	</body>

	 ";



	//$mensaje="De aca te mandaron el correo $correoPersona y este es el mensaje $textoMail la persona se llama asi $nombre";

	$exito=mail($destinario,$asunto,$mensaje,$headers);

	if ($exito) {
			header("Location: contacto.php?MSG=Mensaje Enviado#mensaje");
		}else{
			header("Location: contacto.php?MSG=error#mensaje");
		}
