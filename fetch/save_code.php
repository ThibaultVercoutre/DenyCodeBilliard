<?php

session_start();

include '../includes/database.php';
global $db;

$exercice_id = $_POST["exercice_id"];
$language = $_POST["language"];
$code = $_POST["code"];

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

$sql = "SELECT id FROM saved_code WHERE id_user = :user AND id_exercice = :exercise AND id_language = :language";
$q = $db->prepare($sql);
$q->execute([
    'user' => $user,
    'exercise' => $exercice_id,
    'language' => $id_language
]);
$id_save = json_encode($q->fetchAll());

if($id_save != "[]"){
    $id_save = json_decode($id_save)[0]->id;
}

//Vérifiez si l'ID de l'exercice est valide (supérieur à 0)
if ($id_save != 0 && $user != 0) {
    $sql = "UPDATE saved_code SET code = :code WHERE id = :id";
    $q = $db->prepare($sql);
    $q->execute([
        'code' => $code,
        'id' => $id_save
    ]);

} 

if ($id_save == 0 && $user != 0) {
    $sql = "INSERT INTO saved_code (id_user, id_exercice, id_language, code) VALUES (:user, :exercise, :language, :code)";
    $q = $db->prepare($sql);
    $q->execute([
        'user' => $user,
        'exercise' => $exercice_id,
        'language' => $id_language,
        'code' => $code
    ]);
}

echo $id_save;

?>