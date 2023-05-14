<?php

session_start();

include '../includes/database.php';
global $db;

$exercice_id = $_POST["exercice_id"];
$language = $_POST["language"];

if(isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
}else{
    $user = 0;
}


$sql = "SELECT id FROM languages WHERE name = :name";
$q = $db->prepare($sql);
$q->execute([
    'name' => $language
]);

$id_language = $q->fetchAll()[0]["id"];

$sql = "SELECT code FROM saved_code WHERE id_user = :user AND id_exercice = :exercise AND id_language = :language";
$q = $db->prepare($sql);
$q->execute([
    'user' => $user,
    'exercise' => $exercice_id,
    'language' => $id_language
]);

$code = json_encode($q->fetchAll());

if($code != "[]"){
    $code = json_decode($code)[0]->code;
}else{
    $code = "";
}

echo $code;

?>