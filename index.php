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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header id="hero">
        <div class="hero-content">
            <div id="header-h">
                <a href="#" id="theme"><span class="material-symbols-outlined">dark_mode</span></a>
                <a href="#" id="sign">S'inscrire</a>
            </div>
            <!-- <span class="material-symbols-outlined">dark_mode</span> -->
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
        <div id="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
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
        <div id="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
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
        <div id="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
        <p>Dans cette section vous allez pouvoir découvrir un classement général des notions, exercices ou même languages
            de programmation les plus populaire sur notre plateforme. Ce sera un top qui sera présenté mensuellement et all time.
        </p>
        <div class="chart-container">
            <canvas id="bar-chart-Exercices"></canvas>
            <canvas id="bar-chart-Notions"></canvas>
            <canvas id="bar-chart-Languages"></canvas>
        </div>
        <!-- Contenu des classements -->
    </section>
    <section id="exercise-of-the-week" class="content-section">
        <div id="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
        <!-- Contenu de l'exercice de la semaine -->
    </section>
    <section id="user-account" class="content-section">
        <div id="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
        <!-- Contenu du compte utilisateur -->
        <div id="ajout_contenu">
            <div id="form_ajout_exercice">
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
                <input type="button" name="create_exo" id="create_exo" value="Créer un exercice">
            </div>
            <div id="form_ajout_notion_language">
                <div>
                    <p>Ajouter une notion</p>
                    <input type="text" name="title" id="not_title" placeholder="Entrez le nom de la notion">
                    <input type="button" name="create_not" id="create_not" value="Créer une notion">
                </div>
                <div>
                    <p>Ajouter un language</p>
                    <input type="text" name="title" id="lang_title" placeholder="Entrez le nom du language">
                    <input type="button" name="create_lang" id="create_lang" value="Créer un language">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
