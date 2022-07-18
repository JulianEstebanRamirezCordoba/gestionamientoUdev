<?php
    @session_start();

    unset($_SESSION['cambio_pass']);
    unset($_SESSION['validarID']);
    unset($_SESSION['datosUsuarios']);
    unset($_SESSION['usuario']);
    header('Location: ../index.php');
?>