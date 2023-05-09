<?php

$result = NULL;

if(isset($_SESSION['id'])){
    $q = $db->prepare("SELECT id FROM `validated_exercises` WHERE id_user = :user AND id_exercice = :exercise");
    $q->execute([              
        'user' => $_SESSION['id'],
        'exercise' => $_GET['exercice_id']
    ]);

    $result = $q->fetchColumn();
}

?>