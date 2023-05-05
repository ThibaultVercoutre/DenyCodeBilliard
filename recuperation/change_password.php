<?php

include '../includes/database.php';
global $db;

// Récupérer le jeton de vérification
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    // Gérer l'erreur ici, par exemple en affichant un message d'erreur ou en redirigeant l'utilisateur vers une autre page.
    header('Location: ../index.php');
}




// Vérifier le jeton et activer le compte
$req = $db->prepare('SELECT * FROM users WHERE verification_token = ?');
$req->execute(array($token));
$utilisateur = $req->fetch();

// header("Location: ../index.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny Code Billard - Change MDP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../style/logo/DCB.png" />
    <script src="script/script.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body> 
    <form method="POST" action="">
        <input type="password" name="new_password" id="new_password" placeholder="Nouveau mot de passe">
        <input type="password" name="new_password2" id="new_password2" placeholder="Confirmez votre nouveau mot de passe">
        <input type="submit" name="send_password" value="Envoyer">
    </form>
    <?php
        if(isset($_POST['send_password'])){

            if(!empty($_POST['new_password']) && !empty($_POST['new_password2']) && empty($_POST['new_password']) === empty($_POST['new_password'])){

                // extract($_POST);

                $option = [
                    'cost' => 12,
                ];
                
                $Ihashpass = password_hash($_POST['new_password'], PASSWORD_BCRYPT, $option);

                $q = $db->prepare("UPDATE users SET password = :p WHERE id = :u");
                $q->execute([
                    'p' => $Ihashpass,
                    'u' => $utilisateur['id']
                ]);

                $q = $db->prepare("UPDATE users SET verification_token = '0' WHERE id = :u");
                $q->execute([
                    'u' => $utilisateur['id']
                ]);

                header('Location: ../index.php');
            }
        }
    ?>      
</body>
</html>