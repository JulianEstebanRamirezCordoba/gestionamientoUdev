<?php
    define("SERVIDOR", "b10pbhyt8w3kcpsohfzg-mysql.services.clever-cloud.com");
    define("USUARIO", "ueil4dqyamlqupiy");
    define("DATABASE", "b10pbhyt8w3kcpsohfzg");
    define("PASSWORD", "sTvnXTkzxwITHH2vsJHm");
  
    try {
        $conexion = mysqli_connect(SERVIDOR, USUARIO, PASSWORD);
        mysqli_select_db($conexion,  DATABASE);
        $tils = $conexion->query("SET NAMES 'utf8'");

    }
    catch (Exception $e) {
      exit("error - ". $e->getMessage());  
    }

    