<?php

session_start();

include '../includes/database.php';
global $db;

$id_conversation = $_POST['id_conversation'];


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