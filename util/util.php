<?php
    @session_start();

    include_once "../conexion.php";
    include_once "utilModelo.php";

    define("POSICION_UTIL", 3);

    class util{
        function activoUsuario($tipoUsuario){
            if(isset($_SESSION['usuario'])){
                if($_SESSION['usuario'][POSICION_UTIL] == $tipoUsuario){
                      header("Location: ../complementoDassboard/dassboard.php");
                }else{
                    switch($_SESSION['usuario'][POSICION_UTIL]){
                        case 0:
                           header("Location: ../complementoDassboard/dassboard.php");
                           exit();
                            break;
                        case 1:
                            header("Location: ../complementoDassboard/dassboard.php");
                           exit();
                            break;  
                        case 2:
                            header("Location: ../complementoDassboard/dassboard.php");
                           exit();
                            break; 
                        case 3:
                            header("Location: ../complementoDassboard/dassboard.php");
                           exit();
                            break; 
                        default:
                            break;
                    }
                }

            }else{
                $_SESSION['errorInicio'] = "Correo o contraseña erronea verifique nuevamente";
                header('Location: ../index.php');
                exit();

            }
        }

        function validarVista($tipoUsuario, $visual){
            if($_SESSION['usuario'][POSICION_UTIL] == $tipoUsuario){
                echo $visual;

            }
        
        }

        function generarCodigo(){
            $longitudCode = 6;
            $codificacion = "0987654321";
            $codigo = array();
            
            $longitud = strlen($codificacion) - 1;

            for($index = 1; $index <= $longitudCode; $index++){
                $posicionBuqueda =rand(0, $longitud);
                $codigo[] .= $codificacion[$posicionBuqueda];

            }

            return implode($codigo);

        }

        function fechaActual(){
            $fecha = date("Y") ."-". date("m") ."-". date("d");

            return $fecha;

        }

        function consultaOpTotal($nombreTabla, $campoExtraccion, $consulta){
            global $conexion;
            $sql = "SELECT COUNT($campoExtraccion) AS op_total FROM $nombreTabla WHERE $consulta";
            $query = mysqli_query($conexion, $sql);

            return $query;
            
        }

        function converEstado($estado){
            switch ($estado) {
                case 0:
                    $estadoUser = "Inactivo";
                    break;
                case 1:
                    $estadoUser = "Activo";
                    break;
                    
                default:
                    $estadoUser = "Estado confuso modificarlo";
                    break;
            }
        
            return $estadoUser;
        
        }

    }

?>