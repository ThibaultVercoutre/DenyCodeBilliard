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
    <title>Deny Code Billard - Liste de numeros</title>
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
    <div id="title">Liste de cartes</div>
    <div id="sujet">
        <p>Deny veut maintenant payer ses consommations au billard. Sauf qu'il a trop de carte. Le but est de créer un code répertoriant
            ses 10 cartes différentes, et trouver la bonne. Voici toutes ses cartes :</p>
        <ul>
            <li>Carte 1 : 1267890123456</li>
            <li>Carte 2 : 1234567890123457</li>
            <li>Carte 3 : 4567890123458</li>
            <li>Carte 4 : 1234567123459</li>
            <li>Carte 5 : 12345678901460</li>
            <li>Carte 6 : 1234567890123468</li>
            <li>Carte 7 : 1234567823462</li>
            <li>Carte 8 : 1234567890123463</li>
            <li>Carte 9 : 1234567812364</li>
            <li>Carte 10 : 4567890123465</li>
        </ul>
        <p>Il sait que sa carte à certaines propriétés, il sait que :</p>
        <ul>
            <li>La somme de ses nombre vaut 69</li>
            <li>Lorsqu'il fait la racine de ce nombre, il obtient un nombre dont les 4 premiers chiffre derrière la virgule est un palindrome</li>
            <li>Il contient 2 fois la suite 123</li>
        </ul> 
    </div>

    <?php 
    if($result){
        include 'correction.php'; 
    }else{
        include '../../../includes/c.php';
        include '../../../includes/execute.php';
        echo '<pre id="console"></pre>';
    }
    ?>
</body>
</html>