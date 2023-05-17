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

$q = $db->prepare("SELECT id FROM conversations 
                    WHERE (id_user1 = (SELECT id FROM users WHERE pseudo = :pseudo) AND id_user2 = :user) 
                    OR (id_user2 = (SELECT id FROM users WHERE pseudo = :pseudo) AND id_user1 = :user)");
$q->execute([
    'pseudo' => $pseudo,
    'user' => $user
]);

$id_conversation = $q->fetchAll()[0]["id"];

$q = $db->prepare("SELECT users.pseudo, message, sent_at
                    FROM `messages` 
                    JOIN users ON messages.sender_id = users.id
                    WHERE id_conversation = :id_conversation");
$q->execute([
    'id_conversation' => $id_conversation
]);

$result = $q->fetchAll();

echo json_encode([$result, $id_conversation]);


?>