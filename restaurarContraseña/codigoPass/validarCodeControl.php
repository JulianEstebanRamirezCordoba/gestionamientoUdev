<?php
session_start();

    if(isset(filter_input(INPUT_POST, 'validarCode'))){
        require_once "../../conexion.php";
        require_once "../../util/utilModelo.php";
        include_once "../../util/util.php";

        $util = new util();
        $utilModelo = new utilModelo();

        validarCode();

    }else{
        unset($_SESSION['validarID']);
        header("Location: ../visualEnvioCorr.php");

    }

    function validarCode(){
        global $utilModelo;

        $codigo = filter_input(INPUT_POST, 'codigo');

        

    }

?>