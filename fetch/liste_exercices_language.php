<?php

include '../includes/database.php';
global $db;

$q = $db->prepare(" SELECT exercices.name, exercices.id
                    FROM `exercices` 
                        JOIN notions ON exercices.notion = notions.id
                        JOIN languages ON exercices.language = languages.id 
                        WHERE languages.name = :language AND notions.name = :notion");
$q->execute([           
    'language' => $_POST['language'],
    'notion' => $_POST['notion']
]);

$result = json_encode($q->fetchAll());

echo $result;
?>