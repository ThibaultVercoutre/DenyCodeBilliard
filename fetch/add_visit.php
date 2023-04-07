<?php

include '../includes/database.php';
global $db;

$exercice_id = $_POST["exerciceid"];

// Vérifiez si l'ID de l'exercice est valide (supérieur à 0)
if ($exercice_id > 0) {
    // Préparez la requête SQL pour mettre à jour les colonnes nb_visit et nb_visit_month
    $sql = "UPDATE exercices SET nb_visit = nb_visit + 1, nb_visit_month = nb_visit_month + 1 WHERE id = :id";

    // Préparez la requête avec la connexion à la base de données
    $stmt = $db->prepare($sql);

    // Liez les paramètres à la requête
    $stmt->execute([
        'id' => $exercice_id
    ]);

    echo "Nombre de visites mis à jour avec succès.";
} else {
    echo "L'ID de l'exercice est invalide.";
}

?>