<?php

include '../includes/database.php';
global $db;

$user = $_POST["user"];
$firstname = $_POST["firstname"];

$q = $db->prepare("UPDATE users SET firstname = :f WHERE id = :u");
$q->execute([
    'f' => $firstname,
    'u' => $user
]);

echo $firstname;

?>