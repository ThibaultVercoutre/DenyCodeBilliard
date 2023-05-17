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

$q = $db->prepare("DELETE FROM `friends` WHERE user_id = (SELECT id FROM users WHERE pseudo = :pseudo) AND friend_id = :user");

$q->execute([
    'pseudo' => $pseudo,
    'user' => $user
]);

?>