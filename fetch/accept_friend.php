<?php

session_start();

include '../includes/database.php';
global $db;

$pseudo = $_POST['pseudo'];

if(isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
}else{
    $user = 0;
}

$q = $db->prepare("UPDATE friends 
                    SET status = 1
                    WHERE user_id = (SELECT id FROM users WHERE pseudo = :pseudo)
                    AND friend_id = :user");

$q->execute([
    'pseudo' => $pseudo,
    'user' => $user
]);

$q = $db->prepare("INSERT INTO `conversations`(`id_user1`, `id_user2`) 
                    VALUES ((SELECT id FROM users WHERE pseudo = :pseudo),:user)");

$q->execute([
    'pseudo' => $pseudo,
    'user' => $user
]);

$q = $db->prepare("INSERT INTO friends (user_id, friend_id, status) VALUES (:user, (SELECT id FROM users WHERE pseudo = :pseudo), 1)");
$q->execute([
    'user' => $user,
    'pseudo' => $pseudo
]);
?>