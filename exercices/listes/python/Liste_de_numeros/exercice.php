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
    <div id="title" data="<?php echo $_GET["exercice_id"]?>">Liste de numeros</div>
    <div id="sujet">
        <p>Deny a maintenant sa liste de course (simplement enregistré dans une liste au début de la fonction main). 
            Il doit maintenant contacter les magasins par telephone pour savoir s'ils ont ces articles ou pas. 
            Il faudra donc que pour chaque appel, il demande si les articles sont disponible ou non, ce qui fera que :</p>
        <ul>
            <li>Soit au moins un article n'est pas disponible et le numero est rangé dans une liste qui répertorie les magasins ne possédant pas les articles</li>
            <li>Soit tout les articles sont disponible et le numéro est rangé dans une liste qui répertorie les magasins possédant les articles</li>
        </ul>
            <p>Tout les numéros sont renseigné par l'utilisateur dans une liste<p>
            <p>A la fin, il faudra montrer le ratio des magasins possédant les articles par rapport à tout les magasins</p>
            <p>Il lui faudra donc les fonctions suivantes</p>
        <ul>
            <li>test_numero(numeros_magasins, articles) qui test les magasins</li>
            <li>appel_magasin(numero, articles) qui retourne si l'article est disponible en magasin ou pas. Pour limiter le hasard, tout les numero se finissant avec un nombre impair de caractères ont tout les articles de disponible, sinon indisponible.</li>
            <li>calcul_ratio(numeros_magasins, magasins_avec_articles) qui calcul le ratio du nombre de magasins avec les articles disponibles.</li>
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