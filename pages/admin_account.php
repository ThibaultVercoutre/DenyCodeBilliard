<?php

?>

<div class="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
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
            <input type="number" name="nb_xp" id="nb_xp" min="0" placeholder="Nombre d'xp">
            <input type="text" name="title" id="exo_title" placeholder="Entrez le nom de l'exercice">
        </div>
        <input type="button" name="create_exo" id="create_exo" value="Créer un exercice">

        <p>Ajouter une vérification</p>
        <div id="ajout_verification">
            <select id="choix_language">
                <?php include 'includes/option_language.php'; ?>
            </select>
            <select id="choix_notion">
                <?php include 'includes/option_notion.php'; ?>
            </select id="choix_exercice">
            <select id="choix_exercice">
                <?php include 'includes/option_exercice.php'; ?>
            </select>
            <input type="text" name="name_function" id="name_function" placeholder="Nom de la fonction">
            <input type="text" name="start_var" id="start_var" placeholder="Variables entrantes">
            <input type="text" name="end_var" id="end_var" placeholder="Variables sortantes">
        </div>
        <input type="button" name="add_verif" id="add_verif" value="Ajouter une vérification">
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