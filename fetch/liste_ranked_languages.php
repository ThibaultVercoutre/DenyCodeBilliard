<?php

include '../includes/database.php';
global $db;

$q = $db->prepare("SELECT languages.name AS language, COALESCE(sum(exercices.nb_visit), 0) AS nb_visit, COALESCE(sum(exercices.nb_visit_month), 0) AS nb_visit_month
                    FROM `languages`
                    LEFT JOIN exercices ON languages.id = exercices.language
                    GROUP BY languages.id
                    LIMIT 10");
$q->execute();

$result = json_encode($q->fetchAll());

echo $result;
?>