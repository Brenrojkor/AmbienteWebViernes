<?php
require 'config.php'; // Incluye la configuración de variables de entorno

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarFormulario($data, $files) {
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $edad = $data['edad'];
    $telefono = $data['telefono'];
    $correo = $data['correo'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME']; // Usa la variable de entorno
        $mail->Password = $_ENV['MAIL_PASSWORD']; // Usa la variable de entorno
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente
        $mail->setFrom($_ENV['MAIL_USERNAME'], 'Academia Basketball');
        
        // Destinatario
        $mail->addAddress('academia@ejemplo.com', 'Academia Basketball');

        // Archivo adjunto (si existe)
        if (!empty($files['documento']['name'])) {
            $mail->addAttachment($files['documento']['tmp_name'], $files['documento']['name']);
        }

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva Solicitud de Matrícula';
        $mail->Body    = "
            <html>
            <head>
                <title>Nueva Solicitud de Matrícula</title>
            </head>
            <body>
                <h2>Detalles de la solicitud</h2>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Apellido:</strong> $apellido</p>
                <p><strong>Edad:</strong> $edad</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Correo electrónico:</strong> $correo</p>
            </body>
            </html>
        ";

        // Enviar correo
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
        return false;
    }
}
