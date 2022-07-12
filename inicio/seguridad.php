<?php
    @session_start();
    include_once "../util/utilModelo.php";
    include_once "../util/util.php";
    $utilModelo = new utilModelo();
    $util = new util();

    if(isset($_POST['btnGuardar'])){
            ingreso();
    }

    function ingreso(){
        global $utilModelo;
        global $util;

        $usuarioDefect = 3;

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        define("ESTADO_USUARIOS", 1);

        define("TABLA_DATA_BASE", "usuario");
        define("CAMPOS_EXTRACCION", array("usu_id", "usu_institucion", "usu_estado", "tipo_usuario",
        "usu_nombre", "usu_apellido"));
        define("CAMPOS_DATA_BASE", array("usu_email", "usu_password", "usu_estado"));
        $valoresConsulta = array($email, $password, ESTADO_USUARIOS);
        $limit = "LIMIT 1";

        $consulta = $utilModelo->consultaDatosUnicos(TABLA_DATA_BASE, CAMPOS_EXTRACCION, CAMPOS_DATA_BASE, $valoresConsulta, $limit);

            while($estrutura = mysqli_fetch_array($consulta)){
                if($estrutura != null){
                    $_SESSION['usuario']=array($estrutura['usu_id'], $estrutura['usu_institucion'], 
                    $estrutura['usu_estado'], $estrutura['tipo_usuario']);

                    $_SESSION['datosUsuarios']=array($estrutura['usu_nombre'], $estrutura['usu_apellido']);
            }
    }
   
    $util -> activoUsuario($usuarioDefect);

    }


?>