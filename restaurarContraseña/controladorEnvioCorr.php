<?php
session_start();

    define("TABLAUSUARIO", "usuario");
    define("TABLARESTABLECER", "restablecer_password");
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
        $limit = "LIMIT 1";

        $consultaValidarCorreo = $utilModelo->consultaDatosUnicos(TABLAUSUARIO, CAMPO, $validaCampo, $enviarValidar, $limit);

            if($consultaValidarCorreo->num_rows <= 0){
                echo "Error De usuario no existente";
            
            }else{
                while($extraccion = mysqli_fetch_assoc($consultaValidarCorreo)){
                    if($extraccion != null){
                $_SESSION['validarID'] = $extraccion['usu_id'];
                    }
                }

            $codigoValidarResect = $utilU->generarCodigo();
            $envioExitoso = subirDatos($codigoValidarResect, $_SESSION['validarID'][0]);    
            
            switch ($envioExitoso) {
                case true:
                    enviarCorr($correoUsuario);
                    break;
                case false:
                    echo "Julian Coloca el JavaScript error Ventana flotante";
                    break;
                default:
                    echo "No se que paso";
                    break;
            }
        }  
    }

    function subirDatos($codigoEnvio, $idDeEnvio){
        global $utilU;
        global $utilModelo;

        $fechaCambio = $utilU->fechaActual();
        $camposEx = array('res_id', 'id_usuario2');
        $campoConsul = array('id_usuario2');
        $valorConsol = array($idDeEnvio);
        $limit = "LIMIT 1";

        if($idDeEnvio != "" || $idDeEnvio != null){
        $cosnultaExistencia = $utilModelo->consultaDatosUnicos(TABLARESTABLECER, $camposEx, $campoConsul, $valorConsol, $limit);
            if($cosnultaExistencia->num_rows == 0){
                $camposEnvio = array('id_usuario2', 'res_fecha', 'res_codigo');
                $valoresEnvio = array($idDeEnvio, $fechaCambio, $codigoEnvio);
                $utilModelo->insertarDatos(TABLARESTABLECER, $camposEnvio, $valoresEnvio);

                return true;
    
            }else{
                while($id_rest = mysqli_fetch_assoc($cosnultaExistencia)){
                    if($id_rest != null){
                    $idValida = array('id'=>$id_rest['res_id']);
                    }
                }
                $campoEditado = array('res_codigo');
                $valoresEditado = array($codigoEnvio);
                $campoConsultaEdita = "id_usuario2";
                $utilModelo->actualizarDatos(TABLARESTABLECER, $campoEditado, $valoresEditado, $campoConsultaEdita, $idValida['id']);
        
                return true;
            
            }
        }

        return false;
    }

    function enviarCorr($correoUsuario){
        global $conexion;
        global $corresponsal;

        $id = $_SESSION['validarID'][0];
        $tabal_rest = TABLARESTABLECER;
        $tabal_usu = TABLAUSUARIO;

        $consultaSQL = "SELECT usu_nombre, usu_apellido, usu_institucion, tipo_usuario, res_id, res_fecha, res_codigo 
        FROM $tabal_rest AS tabla_rest
        LEFT JOIN $tabal_usu AS tabla_usu 
        ON tabla_usu.usu_id = tabla_rest.id_usuario2
        WHERE tabla_rest.id_usuario2 = $id
        LIMIT 1;";

        $sql = mysqli_query($conexion ,$consultaSQL);

        while($datosReset = mysqli_fetch_assoc($sql)){
            if($datosReset != null){
            $adactarDatos = array('identificador'=>$datosReset['res_id'], 'nombre'=>$datosReset['usu_nombre'], 
            'apellido'=>$datosReset['usu_apellido'], 'codigoReset'=>$datosReset['res_codigo'], 'fecha'=>$datosReset['res_fecha'],
            'tipo'=>$datosReset['tipo_usuario'], 'pertenece'=>$datosReset['usu_institucion']);
            }
        }



        $asunto = "Tonces Bro esto es una prueva";
        $contenidoMensaje = "<h6>Hola perro</h6>";

        $seEnvia = $corresponsal->enviarCodigo($correoUsuario, $asunto, $contenidoMensaje);

        if($seEnvia == true){
            echo "Ventana certificando que se mando todo bien";
            die();
        }else{
            echo "puta esta mierda no funciono";
            die();
        }
    }

?>