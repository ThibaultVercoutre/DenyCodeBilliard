<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT languages.name AS language, exercices.name AS exercice, exercices.nb_visit AS nb_visit, exercices.nb_visit_month AS nb_visit_month
                    FROM `exercices` 
                    JOIN languages ON languages.id = exercices.language 
                    ORDER BY nb_visit DESC 
                    LIMIT 10");
$q->execute();

$result = json_encode($q->fetchAll());

echo $result;
?>