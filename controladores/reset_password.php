<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el correo electrónico del formulario
    $email = $_POST["email"];
    
    // Validar el correo electrónico (esto es solo un ejemplo, debes hacer una validación más completa)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Configurar los detalles del correo electrónico
        $to = $email;
        $subject = "Restablecimiento de contraseña";
        $message = "Hola,\n\nHaz solicitado restablecer tu contraseña, para el inicio de sesión BOOKS TECH. Por favor, sigue este enlace para restablecerla:\n\nhttp://localhost/proyectoempresa/indexrestablecer.html?email=$email\n\nGracias,\n";
        
        // Configurar las opciones de SMTP
        $smtpConfig = [
            'host' => 'smtp.gmail.com',
            'username' => 'moncadabernalmariafernanda@gmail.com',
            'password' => 'yuwc zzij mfnv auxf',
            'port' => 587, // Puerto TLS
            
        ];
        
        // Cargar la biblioteca PHPMailer (asegúrate de haber descargado y agregado PHPMailer a tu proyecto)
        require '../PHPMailer/PHPMailer.php';
        require '../PHPMailer/SMTP.php';
        require '../PHPMailer/Exception.php';
        
        // Crear una instancia de PHPMailer
       
        $mail = new PHPMailer(true);
        
        try {
            // Configurar el transporte SMTP
            $mail->isSMTP();
            $mail->Host = $smtpConfig['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $smtpConfig['username'];
            $mail->Password = $smtpConfig['password'];
            $mail->Port = $smtpConfig['port'];
           
            
            // Configurar el correo electrónico
            $mail->setFrom($smtpConfig['username']);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $message;


            // Enviar el correo electrónico
            $mail->send();

            echo '<script>
            alert("Se ha enviado un correo electrónico con las instrucciones para restablecer tu contraseña.");
            window.location = "../indexinicio.html";
            </script>';
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
        }
    } else {
        echo "El correo electrónico proporcionado no es válido.";
    }
} 

?>