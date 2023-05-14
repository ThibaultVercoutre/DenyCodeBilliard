<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configurer le serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'ssl0.ovh.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@denycodebillard.com';
    $mail->Password = 'm@PBL3@jTSDB!dA4';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configurer l'e-mail
    $mail->setFrom('support@denycodebillard.com', 'DenyCodeBillard&Company');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Verification';
    $mail->Body = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ". $verification_url;
    
    // Envoyer l'e-mail
    $mail->send();
    echo "E-mail envoyé avec succès. Verifiez vos spams";
} catch (Exception $e) {
    echo "Echec de l'envoi de l'e-mail {$email}. Erreur Mailer: {$mail->ErrorInfo}";
}

?>