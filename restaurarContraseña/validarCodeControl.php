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
            echo "Se pudo";
            while($result = mysqli_fetch_assoc($consulta)){
                if($result != null){
                    $_SESSION['cambio_pass'] = array('id'=>$result["res_id"], 'usuario'=>$result['id_usuario2'],
                'fecha'=>$result["res_fecha"]);
                }
            }

            if(isset($_SESSION['cambio_pass'])){
                $fechaHoy = $util->fechaActual();
                
                $usuario = $_SESSION['cambio_pass']['usuario'];

                if($_SESSION['cambio_pass']['fecha'] == $fechaHoy){
                  $camposActualizar = array(RES_CODE, "res_fecha");
                  $valoresActualizar = array(null, $fechaHoy);
                  $utilModelo->actualizarDatos(TABLA_RES, $camposActualizar, $valoresActualizar, RES_USU2, $usuario);

                  header("Location: VisualRestVal.php");

                }else{ 
                  $valorCode = array(NULL);
                  $actualizar = array(RES_CODE);
                  $utilModelo->actualizarDatos(TABLA_RES, $actualizar, $valorCode, RES_USU2, $usuario);

                    echo "<body>
                    <script src=\"//cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
                    echo " <script>
                    Swal.fire({
                        title: 'Alerta de caducacion del codigo',
                        text: 'El codigo se vuelve no util despues de que el servicio se actualize que es cada madrugada al finaliar dia presente',
                        icon: 'alert',
                        showCancelButton: false,
                        confirmButtonColor: '#ff5733',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href='visualEnviarCorr.php';
                        }
                      })
                        </script>
                        </body>";  

                    unset($_SESSION['validarID']);
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
                    title: 'Error al enviado odtenr tus datos ',
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

            
    }
    

?>