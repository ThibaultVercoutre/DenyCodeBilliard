<?php

include '../includes/database.php';
global $db;

$name = $_POST['pseudo'];

$q = $db->prepare("SELECT pseudo
                    FROM `users`
                    WHERE pseudo LIKE '%$name%'
                    LIMIT 10");
$q->execute();

$result = json_encode($q->fetchAll());

echo $result;
?>