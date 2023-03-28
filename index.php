<?php

include 'includes/database.php';
global $db;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Secret</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="script/script.js" defer></script>
</head>
<body>
    <header id="hero">
        <div class="hero-content">
            <h1 class="hero-title" id="title">> Code Secret</h1>
            <div class="hero-navigation">
                <a href="#" class="nav-link" data-target="languages">Langages</a>
                <a href="#" class="nav-link" data-target="concepts">Notions</a>
                <a href="#" class="nav-link" data-target="rankings">Classements</a>
                <a href="#" class="nav-link" data-target="exercise-of-the-week">Exercice de la semaine</a>
                <a href="#" class="nav-link" data-target="user-account">Compte utilisateur</a>
            </div>
        </div>
    </header>

    <!-- Vos sections ici -->
    <section id="languages" class="content-section">
        <div id='arbo_lang'></div>
        <div class="languages-container">
            <?php include 'includes/liste_languages.php'; ?>
            <!-- Ajoutez d'autres langages de programmation ici -->
        </div>
        <div class="notions-container"></div>
        <!-- Les notions pour chaque langage seront ajoutées ici via JavaScript -->
        
        <div class="exercises-container"></div>
        <!-- Les exercices pour chaque notion seront ajoutés ici via JavaScript -->
        
    </section>
    
    <section id="concepts" class="content-section">
        <div id='arbo_concept'></div>
        <div class="notions-container">
            <?php include 'includes/liste_notions.php'; ?>
            <!-- Les notions seront affichées ici via JavaScript -->
        </div>
        <div class="languages-container"></div>
            <!-- Les langages pour chaque notion seront ajoutés ici via JavaScript -->
        
        <div class="exercises-container"></div>
            <!-- Les exercices pour chaque langage et notion seront ajoutés ici via JavaScript -->
        
    </section>

    <section id="rankings" class="content-section">
        <!-- Contenu des classements -->
    </section>
    <section id="exercise-of-the-week" class="content-section">
        <!-- Contenu de l'exercice de la semaine -->
    </section>
    <section id="user-account" class="content-section">
        <!-- Contenu du compte utilisateur -->
        <form method="POST" id="form_ajout_exercice">
            <p>Ajouter un exercice</p>
            <div id="elements_bdd">
                <select id="ajout_language">
                    <?php include 'includes/option_language.php'; ?>
                </select>
                <select id="ajout_notion">
                    <?php include 'includes/option_notion.php'; ?>
                </select>
                <input type="text" name="title" id="exo_title" placeholder="Entrez le nom de l'exercice">
            </div>
            <div id="elements_html">
                <p>Sujet de l'exercice</p>
                <textarea type='text' name="sujet_exercice" id="sujet_exercice" placeholder="Entrer le sujet de l'exercice"></textarea>
                <p>Code de l'exercice</p>
                <textarea type='text' name="code_exercice" id="code_exercice" placeholder="Entrer le code de l'exercice"></textarea>
                <p>Nombre d'étapes pour y arriver</p>
                <input id="nb_etapes" type="number" name="step" id="step" min="0" max="10" placeholder="Entrez un nombre">
                <div id="etapes"></div>
            </div>
            <input type="button" name="create_exo" id="create_exo" value="Créer un exercice">
            </form>
    </section>
</body>
</html>
