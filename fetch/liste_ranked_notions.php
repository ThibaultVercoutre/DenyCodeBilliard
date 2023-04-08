<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT notions.name AS notion, COALESCE(sum(exercices.nb_visit), 0) AS nb_visit, COALESCE(sum(exercices.nb_visit_month), 0) AS nb_visit_month
                    FROM `exercices` 
                    JOIN languages ON languages.id = exercices.language 
                    JOIN notions ON notions.id = exercices.notion 
                    GROUP BY exercices.notion
                    LIMIT 10");
$q->execute();

$result = json_encode($q->fetchAll());

echo $result;
?>