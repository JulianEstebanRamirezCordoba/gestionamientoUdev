<?php
session_start();

    if(isset($_POST['ValidarCode'])){
        require_once "../conexion.php";
        require_once "../util/utilModelo.php";
        include_once "../util/util.php";

        $util = new util();
        $utilModelo = new utilModelo();
        define("TABLA_RES", "restablecer_password");
        define("RES_CODE", "res_codigo");
        define("RES_USU2","id_usuario2");

        validarCode();

    }else{
        unset($_SESSION['validarID']);
        header("Location: visualEnvioCorr.php");

    }

    function validarCode(){
        global $utilModelo;
        global $util;

        $codigo = filter_input(INPUT_POST, 'codigo');
        $extraccion = array("res_id", RES_USU2, "res_fecha");
        $camposConsult = array(RES_CODE);
        $valoresConsult = array($codigo);
        $limite = "LIMIT 1";
        
        $consulta = $utilModelo->consultaDatosUnicos(TABLA_RES, $extraccion, $camposConsult, $valoresConsult, $limite);
        if($consulta->num_rows == 1){
            while($result = mysqli_fetch_assoc($consulta)){
                if($result != null){
                    $_SESSION['cambio_pass'] = array('id'=>$result["res_id"], 'usuario'=>$result['id_usuario2'],
                'fecha'=>$result["res_fecha"]);
                }
            }
            if(isset($_SESSION['cambio_pass'])){
                $fechaHoy = $util->fechaActual();
                $code = $util->generarCodigo();
                $camposActualizar = array("res_fecha", "res_codigo");
                $valoresActualizar = array($fechaHoy $code);
                $usuario = $_SESSION['cambio_pass']['usuario'];
                $actualizar = $utilModelo->actualizarDatos(TABLA_RES, $camposActualizar, $valoresActualizar, RES_USU2, $usuario);
                unset($_SESSION['validarID']);
                header("Location: VisualRestVal.php");

                }else{
                  echo "<body>
                <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
                echo " <script>
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })
                  
                  swalWithBootstrapButtons.fire({
                    title: 'Tu codigo no a sido enviado',
                    text: 'Por favor comunicate con el area encargada para que te 
                    cambien la contraseña o validen tu estado',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Salir',
                    reverseButtons: false
                  }).then((result) => {
                    if (
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.location.href='../inicio/cierreSesion.php';
                      )
                    }
                  })
                    </script>
                    </body>";
                }
            }else{
                echo "<body>
                <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
                echo " <script>
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })
                  
                  swalWithBootstrapButtons.fire({
                    title: 'Error al enviado o odtener tus datos ',
                    text: 'Por favor llamar a administracion para arreglar el problema',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Salir',
                    reverseButtons: false
                  }).then((result) => {
                    if (
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.location.href='../inicio/cierreSesion.php';
                      )
                    }
                  })
                    </script>
                    </body>";

            } 
        } 
?>