<?php

include '../includes/database.php';
global $db;


// ----------------------------------------------------------------
// Creer exercice
// ----------------------------------------------------------------

$data = json_decode($_POST["données"]);

$q = $db->prepare("SELECT id FROM `languages` WHERE name = :language");
$q->execute([
    'language' => $data->language
]);
$language_id = $q->fetch()['id'];

$q = $db->prepare("SELECT id FROM `notions` WHERE name = :notion");
$q->execute([
    'notion' => $data->notion
]);
$notion_id = $q->fetch()['id'];

$q = $db->prepare(" INSERT INTO `exercices`(`language`, `notion`, `name`, `sujet`, `correction`, `nb_etapes`) 
                    VALUES (:language, :notion, :name, :sujet, :correction, :nb_etapes)");

$q->execute([           
    'language' => $language_id,
    'notion' => $notion_id,
    'name' => $data->titre,
    'sujet' => "",
    'correction' => "",
    'nb_etapes' => 0
]);

echo 'Exercice créé';

?>
