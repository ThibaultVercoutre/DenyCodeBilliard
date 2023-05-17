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

$q = $db->prepare("SELECT id
                    FROM `users`
                    WHERE pseudo = :pseudo");

$q->execute([
    'pseudo' => $pseudo,
]);

$result = $q->fetchAll()[0]["id"];

$q = $db->prepare("SELECT status
                    FROM `friends`
                    WHERE user_id = :id AND friend_id = :friend_id");

$q->execute([
    'id' => $user,
    'friend_id' => $result
]);

$exist = $q->fetchAll();

if($result != 0 && $user != 0 && $exist == []) {
    $q = $db->prepare("INSERT INTO friends (user_id, friend_id, status) VALUES (:user, :friend, 0)");
    $q->execute([
        'user' => $user,
        'friend' => $result
    ]);
    echo "Vous avez envoyé une demande d'amis !";
}else{
    echo "Vous avez déjà ajouté cet utilisateur !";
}
?>