<?php

include '../includes/database.php';
global $db;

$user = $_POST["user"];
$name = $_POST["name"];

$q = $db->prepare("UPDATE users SET name = :n WHERE id = :u");
$q->execute([
    'n' => $name,
    'u' => $user
]);

echo $name;

?>