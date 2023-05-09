<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configurer le serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'denycodebillard@gmail.com';
    $mail->Password = 'nsreolnftmnxtnms';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configurer l'e-mail
    $mail->setFrom('denycodebillard@gmail.om', 'DenyCodeBillard&Company');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Verification';
    $mail->Body = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ". $verification_url;
    
    // Envoyer l'e-mail
    $mail->send();
    echo "E-mail envoyé avec succès";
} catch (Exception $e) {
    echo "Echec de l'envoi de l'e-mail {$email}. Erreur Mailer: {$mail->ErrorInfo}";
}

?>