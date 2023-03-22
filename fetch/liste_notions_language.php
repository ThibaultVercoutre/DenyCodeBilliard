<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT * FROM `languages` WHERE name = :name");
$q->execute([              
    'name' => $_POST['language']
]);

$result = $q->fetchColumn();

$q = $db->prepare("SELECT notions.name FROM `exercices` JOIN notions ON exercices.notion = notions.id WHERE language = :language GROUP BY notions.name ORDER BY notions.name");
$q->execute([           
    'language' => $result
]);

$result = json_encode($q->fetchAll());

echo $result;
?>