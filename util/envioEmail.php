<?php
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

class enviarCorreos{
    
   function enviarCodigo($destino, $asuntoCorr, $cuerpoMensajeEnviar){
       $email = new PHPMailer(true);
            try{
                $email->SMTPDebug = 0;
                $email->isSMTP();
                $email->Host = "smtp-julianesteban.alwaysdata.net";                     
                $email->SMTPAuth = true;
            

                $email->Username = 'julianesteban@alwaysdata.net';                     
                $email->Password = 'osquitarPerro';                            
                $email->STMPSecure = 'tls';
                $email->Port = 587;                                     

            
                $email->setFrom('julianesteban@alwaysdata.net', 'Gestionando tus Salones Mejorando Fronteras EDU');
                $email->addAddress($destino, '');       

        
                $email->isHTML(true);               
                $email->Subject = $asuntoCorr;
                $email->Body = $cuerpoMensajeEnviar;
                $email->AltBody = 'Funcion no definida';
                $email->send();

             }catch (Exception $e) {
                echo "<h2 class='login-form-link'> Error de conexion con el servicio 
                <br> $e";
            
            return false;

            }
    }
}
?>