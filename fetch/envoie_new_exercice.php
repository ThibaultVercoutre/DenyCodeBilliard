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

// // ----------------------------------------------------------------
// // Creer parties de l'exercice
// // ----------------------------------------------------------------

// $data2 = json_decode($_POST["etapes"]);

// $q = $db->prepare("SELECT id FROM `exercices` WHERE language = :language AND notion = :notion AND name = :name");
// $q->execute([
//     'language' => $language_id,
//     'notion' => $notion_id,
//     'name' => $data->titre
// ]);
// $exercice_id = $q->fetch()['id'];

// for($i = 0; $i < $data->nb_etapes; $i++){
//     $q = $db->prepare(" INSERT INTO `etapes`(`exercice`, `num_etape`, `code`, `explication`) 
//                         VALUES (:exercice, :num_etape, :code, :explication)");
//     $q->execute([           
//         'exercice' => $exercice_id,
//         'num_etape' => $i+1,
//         'code' => $data2[$i]->code,
//         'explication' => $data2[$i]->explication
//     ]);
// }

echo 'Exercice créé';

?>
