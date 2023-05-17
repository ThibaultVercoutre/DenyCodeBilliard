<?php

session_start();

include '../includes/database.php';
global $db;

$id_conversation = $_POST['id_conversation'];
$pseudo = $_POST['pseudo'];
$message = $_POST['message'];

if(isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
}else{
    $user = 0;
}

$q = $db->prepare("INSERT INTO `messages`(`sender_id`, `receiver_id`, `message`, `id_conversation`) 
                    VALUES (:user, (SELECT id FROM users WHERE pseudo = :pseudo), :message, :id_conversation)");
$q->execute([
    'user' => $user,
    'pseudo' => $pseudo,
    'message' => $message,
    'id_conversation' => $id_conversation
]);

$q = $db->prepare("SELECT users.pseudo, message, sent_at
                    FROM `messages` 
                    JOIN users ON messages.sender_id = users.id
                    WHERE id_conversation = :id_conversation");
$q->execute([
    'id_conversation' => $id_conversation
]);

$result = $q->fetchAll();

echo json_encode($result);

?>