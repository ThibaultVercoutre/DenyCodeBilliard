<?php

include '../includes/database.php';
global $db;

$email = $_POST['email'];

$q = $db->prepare(" SELECT email
                    FROM `users` 
                        WHERE email = :email");
$q->execute([           
    'email' => $email
]);

$user = $q->fetch();

if($user){
    $verification_token = bin2hex(random_bytes(16));
    $verification_url = "https://denycodebillard.com/recuperation/change_password.php?token=" . $verification_token;

    $q = $db->prepare(" UPDATE `users`
                        SET verification_token = :verification_token
                            WHERE email = :email");
    $q->execute([           
        'email' => $email,
        'verification_token' => $verification_token
    ]);

    include '../includes/send_mail_recup.php';
} else {
    echo "Email non trouvé";
}
?>