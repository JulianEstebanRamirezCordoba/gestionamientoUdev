<?php
session_start();

    define("TABLAUSUARIO", "usuario");
    define("CAMPO", array("usu_id"));

    if(isset($_POST['enviarCorreo'])){
        require_once "../conexion.php";
        require_once "../util/envioEmail.php";
        include_once "../util/util.php";
        include_once "../util/utilModelo.php";

        $utilModelo  = new utilModelo();
        $corresponsal = new enviarCorreos();
        $utilU = new util();

        validarUsuario();

    }else{
        header('Location: ../inicio/loginVista.php');

    } 

    function validarUsuario(){
        global $utilU;
        global $utilModelo;

        $correoUsuario = filter_input(INPUT_POST, "Validaemail");
        $enviarValidar = array($correoUsuario);
        $validaCampo = array("usu_email");

        $consultaValidarCorreo = $utilModelo->consultaDatosUnicos(TABLAUSUARIO, CAMPO, $validaCampo, $enviarValidar);

            if($consultaValidarCorreo->num_rows == 0){
                $_SESSION['ManejoError'] = "Error";
                echo $_SESSION['ManejoError'];
            
            }else{
                while($extraccion = mysqli_fetch_assoc($consultaValidarCorreo)){
                $_SESSION['validarID'] = $extraccion['usu_id'];
                
                }

            $codigoValidarResect = $utilU->generarCodigo();

                subirDatos($codigoValidarResect, $_SESSION['validarID'][0]);

        }  
    }

    function subirDatos($codigoEnvio, $idDeEnvio){
        global $utilU;
        global $utilModelo;

        $fechaCambio = $utilU->fechaActual();

        if($idDeEnvio != "" || $idDeEnvio != null){
            $tablaReset = "restablecer_password";
            $camposEnvio = array('id_usuario2', 'res_fecha', 'res_codigo');
            $valoresEnvio = array($idDeEnvio, $fechaCambio, $codigoEnvio);

            $utilModelo->insertarDatos($tablaReset, $camposEnvio, $valoresEnvio);

        }

    }

    function enviarCorr(){
        global $conexion;

        $id = $_SESSION['validarID'][0];

        $consultaSQL = "SELECT usu_nombre, usu_apellido, usu_institucion, tipo_usuario, res_id, res_fecha, res_codigo 
        FROM restablecer_password AS tabla_rest
        LEFT JOIN usuario AS tabla_usu 
        ON tabla_usu.usu_id = tabla_rest.id_usuario2
        WHERE tabla_rest.id_usuario2 = $id
        LIMIT 1;";

        $sql = mysqli_query($conexion ,$consultaSQL);

        while($datosReset = mysqli_fetch_assoc($sql)){
            $adactarDatos = array('identificador'=>$datosReset['res_id'], 'nombre'=>$datosReset['usu_nombre'], 
            'apellido'=>$datosReset['usu_apellido'], 'codigoReset'=>$datosReset['res_codigo'], 'fecha'=>$datosReset['res_fecha']
            );
        }



    }

?>