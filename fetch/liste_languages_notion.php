<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT * FROM `notions` WHERE name = :name");
$q->execute([              
    'name' => $_POST['notion']
]);

$result = $q->fetchColumn();

$q = $db->prepare("SELECT languages.name FROM `exercices` JOIN languages ON exercices.language = languages.id WHERE notion = :notion GROUP BY languages.name ORDER BY languages.name");
$q->execute([           
    'notion' => $result
]);

$result = json_encode($q->fetchAll());

echo $result;
?>
