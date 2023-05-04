<?php

include '../includes/database.php';
global $db;

$user = $_POST["user"];
$theme = $_POST["theme"];

$q = $db->prepare("UPDATE users SET theme = :t WHERE id = :u");
$q->execute([
    't' => $theme,
    'u' => $user
]);

?>