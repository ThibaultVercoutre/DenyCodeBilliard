<?php

include '../includes/database.php';
global $db;

session_start();

$id_exo = $_POST['id_exo'];
$id_user = $_SESSION['id'];

$q = $db->prepare("INSERT INTO `validated_exercises`(`id_user`, `id_exercice`) 
                    VALUES (:id_user, :id_exo)");

$q->execute([
    'id_user' => $id_user,
    'id_exo' => $id_exo
]);

$q = $db->prepare("UPDATE `users` SET `xp` = `xp` + (SELECT `nb_xp` FROM `exercices` WHERE `id` = :id_exo) WHERE `id` = :id_user");

$q->execute([
    'id_user' => $id_user,
    'id_exo' => $id_exo
]);

echo "success";

?>