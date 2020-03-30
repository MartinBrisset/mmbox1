
<div id="menu">
  <a href="indexUsr.php">Calendario</a>
  <a href="administracion.php">Administrar Eventos</a>
  <a href="FormEventosINS.php">Crear Evento</a>
  <a href="FormUsuarioREG.php">Nuevo Usuario</a>
  <a href="MisDatos.php">Mis Datos</a>
  <a href="Salir.php">Salir</a>

<?php


        $nombre = $_SESSION["user"];
        echo "<span>Usuario conectado: <b>$nombre</b></span><br />\n";


?>

</div>
