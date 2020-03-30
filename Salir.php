<?php

  include"includes/CtrlSession.inc";

 ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8" />
	<meta name="author" content="Curso PHP - BIOS" />
	<title>MiniSistema de Noticias</title>
    <link rel="stylesheet" href="css/Estilos.css" />
</head>

<body>

<!-- SECCION CONTENIDO -->
<div id="contenido">
  <fieldset id="dsc">
    <p>
     <?php


        session_destroy();

        header("Location: entrar");

     ?>
    </p>
  </fieldset>
</div>
</body>
</html>
