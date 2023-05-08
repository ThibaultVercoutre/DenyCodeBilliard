<?php

include '../includes/database.php';
global $db;

$pseudo = $_POST['pseudo'];

$q = $db->prepare(" SELECT email
                    FROM `users` 
                        WHERE pseudo = :pseudo");
$q->execute([           
    'pseudo' => $pseudo
]);

$user = $q->fetch();

if($user != ''){
    $verification_token = bin2hex(random_bytes(16));
    $verification_url = "https://denycodebillard.com/recuperation/change_password.php?token=" . $verification_token;

    $q = $db->prepare(" UPDATE `users`
                        SET verification_token = :verification_token
                            WHERE pseudo = :pseudo");
    $q->execute([           
        'pseudo' => $pseudo,
        'verification_token' => $verification_token
    ]);

    $email = $user['email'];
    include '../includes/send_mail_recup.php';
} else {
    echo "Pseudo non trouvé";
}
?>