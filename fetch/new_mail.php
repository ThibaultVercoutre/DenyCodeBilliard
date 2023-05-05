<?php

include '../includes/database.php';
global $db;

$user = $_POST["user"];
$mail = $_POST["mail"];

$q = $db->prepare("UPDATE users SET email = :m WHERE id = :u");
$q->execute([
    'm' => $mail,
    'u' => $user
]);

echo $mail;

?>