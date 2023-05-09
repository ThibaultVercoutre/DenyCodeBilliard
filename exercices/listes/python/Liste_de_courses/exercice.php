<?php

session_start();

include '../../../../includes/database.php';
global $db;

include '../../../includes/test_valide.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny Code Billard - Liste de courses</title>
    <link rel="icon" href="../../../../style/logo/DCB.png" />
    <link rel="stylesheet" href="../../../style/style.css">
    <script src="../../../script/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <script src="/Ace/src/ace.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div id="title">Liste de courses</div>
    <div id="sujet">
        <p>Créer une liste de course pour le jeune Deny qui veut apprendre le billiard. 
            Il va devoir acheter une queue, un set de boules et un petit tamon pour frotter le bout de sa queue. 
            Il faudra qu'il y ait :</p>
        <ul>
            <li>une fonction qui demande à l'utilisateur sa liste de course (taper fin pour finir sa liste de course)</li>
            <li>une fonction qui tri sa liste de course par ordre alphabétique</li>
            <li>une fonction qui tri sa liste par la chaine de caractère la plus courte à la plus longue</li>
            <li>une fonction qui demande s'il vient d'acheter une objet parmis les x de la liste (il devra taper 1 - 2 - 3 ... ou X pour choisir un objet, faire une petite présentation graphique) et s'arrête lorsqu'il n'y a plus d'objet dans la liste</li>
        </ul>
    </div>

    <?php 
    if($result){
        include 'correction.php'; 
    }else{
        include '../../../includes/python.php';
        include '../../../includes/execute.php';
        echo '<pre id="console"></pre>';
    }
    ?>
</body>
</html>