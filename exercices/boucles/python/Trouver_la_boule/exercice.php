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
    <title>Deny Code Billard - Trouver la boule</title>
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
    <div id="title">Trouver la boule</div>
    <div id="sujet">
        <p>Notre jeune Deny a besoin de trouver la boule blanche pour jouer au billard américain.
            Il va devoir alors regarder une par une les boules de son jeu de billard pour trouver la boule blanche.
            Pour cela il aura une liste de boules de billard avec leur couleur et leur numéro. La boule blanche et la boule noire
            auront 0 comme numéro. Il y aura donc 16 boules de billard dans la liste.
            Il y aura donc la fonction suivante :
        </p>
        <ul>
            <li>Une fonction qui cherche la boule de couleur blanche</li>
        </ul>
    </div>

    <?php 
    if($result){
        echo $result;
        include 'correction.php'; 
    }else{
        echo $result;
        include '../../../includes/python.php';
        include '../../../includes/execute.php';
        echo '<pre id="console"></pre>';
    }
    ?>
</body>
</html>