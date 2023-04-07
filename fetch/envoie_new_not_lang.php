<?php

include '../includes/database.php';
global $db;

if(json_decode($_POST["type"]) == 1){
    $q = $db->prepare(" INSERT INTO `notions`(`name`) VALUES (:nom)");
}

if(json_decode($_POST["type"]) == 2){
    $q = $db->prepare(" INSERT INTO `languages`(`name`,`level`) VALUES (:nom, 5)");
}

$q->execute([
    'nom' => $_POST["name"]
]);

echo 'reussis';

?>