<?php

include 'includes/database.php';
global $db;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DenyCodeBilliard</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="script/script.js" defer></script>
</head>
<body>
    <header id="hero">
        <div class="hero-content">
            <h1 class="hero-title">DenyCodeBilliard</h1>
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
        <div class="notions-container">
            <!-- Les notions pour chaque langage seront ajoutées ici via JavaScript -->
        </div>
        <div class="exercises-container">
            <!-- Les exercices pour chaque notion seront ajoutés ici via JavaScript -->
        </div>
    </section>
    
    <section id="concepts" class="content-section">
        <div id='arbo_concept'></div>
        <div class="notions-container">
            <?php include 'includes/liste_notions.php'; ?>
            <!-- Les notions seront affichées ici via JavaScript -->
        </div>
        <div class="languages-container">
            <!-- Les langages pour chaque notion seront ajoutés ici via JavaScript -->
        </div>
        <div class="exercises-container">
            <!-- Les exercices pour chaque langage et notion seront ajoutés ici via JavaScript -->
        </div>
    </section>

    <section id="rankings" class="content-section">
        <!-- Contenu des classements -->
    </section>
    <section id="exercise-of-the-week" class="content-section">
        <!-- Contenu de l'exercice de la semaine -->
    </section>
    <section id="user-account" class="content-section">
        <!-- Contenu du compte utilisateur -->
    </section>
</body>
</html>
