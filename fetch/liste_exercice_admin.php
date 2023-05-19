<?php

include '../includes/database.php';
global $db;

$language = $_POST['language'];
$notion = $_POST['notion'];

$q = $db->prepare(" SELECT exercices.name as name
                    FROM `exercices` 
                        JOIN `languages` ON languages.id = exercices.language 
                        JOIN notions ON notions.id = exercices.notion
                        WHERE languages.name = :language AND notions.name = :notion");
$q->execute([           
    'language' => $language,
    'notion' => $notion
]);

$result = json_encode($q->fetchAll());

echo $result;
?>