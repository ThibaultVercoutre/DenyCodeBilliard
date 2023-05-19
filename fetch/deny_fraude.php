<?php

session_start();

include '../includes/database.php';
global $db;

$function = $_POST['functions'];
$id_exo = $_POST['exercice_id'];

$q = $db->prepare("SELECT start_variables, end_variables FROM functions_verification WHERE id_exercice = :id AND function = :function");
$q->execute([
    'id' => $id_exo,
    'function' => $function
]);

echo json_encode([$function, $q->fetchAll()]);

?>