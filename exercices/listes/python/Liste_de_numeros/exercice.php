<?php

session_start();

include '../../../../includes/database.php';
global $db;

$q = $db->prepare("SELECT id FROM `validated_exercises` WHERE id_user = :user AND id_exercice = :exercise");
$q->execute([              
    'user' => $_SESSION['id'],
    'exercise' => $_GET['exercice_id']
]);

$result = $q->fetchColumn();

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
    <div id="title">Liste de numeros</div>
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
    </div>

    <?php 
    if($result){
        include 'correction.php'; 
    }else{
        echo '<div id="my-editor-python"></div>';
        include '../../../includes/execute.php';
        echo '<pre id="console" style="background-color: black; color: white; height: 200px; width: 600px;"></pre>';
    }
    ?>
</body>
</html>