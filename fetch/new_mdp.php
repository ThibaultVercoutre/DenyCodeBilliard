<?php

include '../includes/database.php';
global $db;

$user = $_POST["user"];
$password = $_POST["password"];

$req = $db->prepare('SELECT * FROM users WHERE id = ?');
$req->execute(array($user));
$utilisateur = $req->fetch();

if (password_verify($password, $utilisateur['password'])) {
    $verification_token = bin2hex(random_bytes(16));
    $verification_url = "https://denycodebillard.com/recuperation/change_password.php?token=" . $verification_token;
    include '../includes/send_mail_change_password.php';
    $q = $db->prepare("UPDATE users SET verification_token = :t WHERE id = :u");
    $q->execute([
        't' => $verification_token,
        'u' => $user
    ]);
    echo "Un mail vous a été envoyé pour changer votre mot de passe !";
} else {
    echo "Vous avez rentré un mauvais mot de passe !";
}

?>