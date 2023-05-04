<?php

include '../includes/database.php';
global $db;

// Récupérer le jeton de vérification
$token = $_GET['token'];

// Vérifier le jeton et activer le compte
$query = $db->prepare("UPDATE users SET is_verified = 1, verification_token = '0' WHERE verification_token = :token");
$query->execute([
    'token' => $token
]);

// Afficher un message de succès ou d'erreur en fonction du résultat
if ($query->rowCount() > 0) {
    echo "Votre adresse e-mail a été vérifiée avec succès et votre compte est maintenant activé.";
} else {
    echo "Le lien de vérification est invalide ou expiré. Veuillez vous assurer d'utiliser le lien envoyé à votre adresse e-mail.";
}

session_start();
session_unset();
session_destroy();

header("Location: login.php");
?>
