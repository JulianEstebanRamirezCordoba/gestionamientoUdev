<?php
    @session_start();
    include_once "../util/utilModelo.php";
    include_once "../util/util.php";
    $utilModelo = new utilModelo();
    $util = new util();

    define("CAMPOVALIDARID", "usu_id");
    define("CAMPOVALIDARCORREO","usu_email");
    define("TABLAUSUARIOS", "usuario");

    class controlDass{
        function conteosUsuariosUdev(){
            global $utilModelo;

            $adicion = CAMPOVALIDARID." IS NOT NULL AND ".CAMPOVALIDARCORREO." IS NOT NULL AND ";
            $estadoUser = 1;
            $institutoUsuario = 0;

            define("VALORESUSERUDEV",array($estadoUser, $institutoUsuario));
            define("CAMPOSUSERUDEV", array("usu_estado", "usu_institucion"));

            $resultado = $utilModelo->consultaOperaciones(TABLAUSUARIOS, CAMPOVALIDARID, CAMPOSUSERUDEV,
            VALORESUSERUDEV, $adicion);
           
            while($establece = mysqli_fetch_assoc($resultado)){
                if($establece != null){
                   return $establece["op_resultado"];

                }

            }

            return "<h6>Error en estraccion</h6>";

            
        }

        function conteosUsuariosCompubuga(){
            global $utilModelo;

            $adicion = CAMPOVALIDARID." IS NOT NULL AND ".CAMPOVALIDARCORREO." IS NOT NULL AND ";
            $estadoUser = 1;
            $institutoUsuario = 1;

            define("VALORESUSERCOMPUBUGA",array($estadoUser, $institutoUsuario));
            define("CAMPOSUSERCOMPUBUGA", array("usu_estado", "usu_institucion"));

            $resultado = $utilModelo->consultaOperaciones(TABLAUSUARIOS, CAMPOVALIDARID, CAMPOSUSERCOMPUBUGA,
            VALORESUSERCOMPUBUGA, $adicion);
           
            while($establece = mysqli_fetch_assoc($resultado)){
                if($establece != null){
                   return $establece["op_resultado"];

                }

            }

            return "<h6>Error en estraccion</h6>";

            
        }

        function conteosUsuariosMoscati(){
            global $utilModelo;

            $adicional = CAMPOVALIDARID." IS NOT NULL AND ".CAMPOVALIDARCORREO." IS NOT NULL AND ";
            $estadoUser = 1;
            $institutoUsuario = 2;

            define("VALORESUSERMOSCATI", array($estadoUser, $institutoUsuario));
            define("CAMPOSUSERMOSCATI", array("usu_estado", "usu_institucion"));

            $sql = $utilModelo->consultaOperaciones(TABLAUSUARIOS, CAMPOVALIDARID, CAMPOSUSERMOSCATI, VALORESUSERMOSCATI, $adicional);

            while($result = mysqli_fetch_assoc($sql)){
                if($result != null){
                    return $result["op_resultado"];

                }

            }

            return "<h6>Error en estraccion</h6>";

        }

        function conteoDesactivos(){
            global $utilModelo;
            $estado = 0;

            define("VALORESDESACTIVOS", array($estado));
            define("CAMPOSDES", array("usu_estado"));

            $sql = $utilModelo->consultaOperaciones(TABLAUSUARIOS, CAMPOVALIDARID, CAMPOSDES, VALORESDESACTIVOS);

            while($result = mysqli_fetch_assoc($sql)){
                if($result != null){
                    return $result['op_resultado'];

                }

            }

            return "<h6>Error en estraccion</h6>";

        }

        function TotalUsurios(){
            global $util;
            
            $consulta = CAMPOVALIDARID." IS NOT NULL AND ".CAMPOVALIDARCORREO." IS NOT NULL";

            $sql = $util->consultaOpTotal(TABLAUSUARIOS, CAMPOVALIDARID, $consulta);

            while($estable = mysqli_fetch_assoc($sql)){
                if($estable != null){
                   return $estable["op_total"];

                }
            }
            
            return "<h6>Error</h6>";

        }

        function porsentajeUser($totalUsuarios = 0, $usuariosUdev = 0, $usuariosCompubuga = 0, $usuariosMoscati = 0, $usuariosDesactivos = 0){
            define("VALOROP", 100);

            $resultadoOpUdev = $usuariosUdev / $totalUsuarios * VALOROP;    
            $resultadoOpCompubuga = $usuariosCompubuga / $totalUsuarios * VALOROP;
            $resultadoOpMoscati = $usuariosMoscati / $totalUsuarios * VALOROP;
            $resultadoOpDesactivos = $usuariosDesactivos / $totalUsuarios * VALOROP;

            define("PORSENTAJES", array('porsentajeUdev'=>$resultadoOpUdev, 'porsentajeCompubuga'=>$resultadoOpCompubuga, 'porsentjeMoscati'=>$resultadoOpMoscati, 
            'porsentajeDesactivos'=>$resultadoOpDesactivos));

            return PORSENTAJES;
        }
    }

?>