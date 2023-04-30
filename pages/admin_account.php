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