<?php

include '../includes/database.php';
global $db;

$q = $db->prepare(" SELECT *
                    FROM `exercices`
                        WHERE id = :id");
$q->execute([           
    'id' => $exercise_id
]);

$result = $q->fetch();




$q = $db->prepare(" SELECT *
                    FROM `etapes`
                        WHERE exercice = :id");
$q->execute([           
    'id' => $exercise_id
]);

$result2 = $q->fetchAll();

?>