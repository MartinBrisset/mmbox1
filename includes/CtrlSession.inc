<?php
    // CONTROL DE SESSION
    session_start();
    if (!isset($_SESSION["user"])) {
        // enviar mensaje de error
        header("Location: entrar/");
    } // endif
?>