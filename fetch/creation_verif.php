<?php

include '../includes/database.php';
global $db;


// ----------------------------------------------------------------
// Creer une vérification
// ----------------------------------------------------------------

$language = $_POST['language'];
$notion = $_POST['notion'];
$exercice = $_POST['exercice'];
$function = $_POST['function'];
$start_var = $_POST['start_var'];
$end_var = $_POST['end_var'];

$q = $db->prepare("INSERT INTO `functions_verification`(`id_exercice`, `function`, `start_variables`, `end_variables`) 
                    VALUES ((SELECT id from `exercices` 
                                WHERE name = :exercice
                                AND language = (SELECT id from `languages` 
                                                WHERE name = :language)
                                AND notion = (SELECT id from `notions` 
                                                WHERE name = :notion)),
                            :function,
                            :start_var,
                            :end_var)");
$q->execute([
    'exercice' => $exercice,
    'language' => $language,
    'notion' => $notion,
    'function' => $function,
    'start_var' => $start_var,
    'end_var' => $end_var
]);
//$language_id = $q->fetch()['id'];

echo $language . $notion . $exercice . $function . $start_var . $end_var;

?>
