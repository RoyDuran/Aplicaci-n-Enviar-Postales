<?php
require "buscarCorreo.php";
$imagen = $_POST["imagen"];

//ENVIAR CORREO
// Conceder permisos a todos los ficheros de clases del paquete PHPMailer-master/src/
// Coomentar los namespace en todos los ficheros de clases del paquete PHPMailer-master/src/
spl_autoload_register(function ($clase) {
    $fullpath = "./PHPMailer-master/src/" . $clase . ".php";
    if (file_exists($fullpath))
        require_once $fullpath;
    else
        echo "<p>La clase $fullpath no se encuentra</p>";
});
// require 'vendor/autoload.php';
// Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
$mail = new PHPMailer(true);
// Configuración del servidor
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
$mail->isSMTP();                                      // Establece el tipo de correo electrónico para usar SMTP
$mail->Host = 'localhost';                     // Especifica los servidores SMTP principales y de respaldo
$mail->SMTPAuth = false;                               // Habilita la autenticación SMTP
$mail->Username = '';                   // Nombre de usuario SMTP
$mail->Password = '';                   // Contraseña SMTP
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
$mail->Port = 587;                                    // Puerto TCP para conectarse
echo 'Pasado la configuración del objeto';
try {
    // Configura y envía el mensaje
    $mail->setFrom('roy@opctech.es', 'roy');
    $mail->addAddress($correo, $nombre);
    $mail->Subject = $asunto;
    $ruta = "imagenes/" . $imagen;
    $mail->addEmbeddedImage($ruta, "imagen_cid");
    $mail->isHTML(true);
    $mail->Body = "<html>
                    <body>
                     <p>" . $mensaje . "</p>
                     <img src='cid:imagen_cid' alt='" . $imagen . "'>
                    </body>
                   </html>";
    $mail->send();
} catch (Exception $e) {
    echo 'El mensaje no pudo ser enviado.';
    echo 'Error de correo: ' . $mail->ErrorInfo;
}
