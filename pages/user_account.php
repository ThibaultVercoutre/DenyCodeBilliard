<?php

?>

<div class="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
<!-- Contenu du compte utilisateur -->
<div class="profile-container">
    <div class="profile-image">
        <img src="style/images_profils/profil_defaut.webp" alt="Photo de profil">
    </div>
    <div class="profile-info">
        <h2><span id="change_name" class="edit_profil material-symbols-outlined">edit</span><?php echo $_SESSION['name'] . " " . $_SESSION['firstname']; ?><span id="change_firstname" class="edit_profil material-symbols-outlined">edit</span></h2>
        <p><strong>Email : </strong> <?php echo $_SESSION['email']; ?><span id="change_email" class="edit_profil material-symbols-outlined">edit</span></p>
        <p><strong>Pseudo : </strong> <?php echo $_SESSION['pseudo']; ?></p>
        <p><strong>Date de naissance : </strong> <?php echo $_SESSION['birthday']; ?></p>
        <div id="change_mdp">Modifier le mot de passe</div>
    </div>
</div>

<div class="profile-change" id="modif_name">
    <h2>OIoihoeurhg</h2>
</div>

<div class="profile-change" id="modif_firstname">
    <h2>OIoihoeurhg</h2>
</div>

<div class="profile-change" id="modif_email">
    <h2>OIoihoeurhg</h2>
</div>

<div class="profile-change" id="modif_mdp">
    <h2>OIoihoeurhg</h2>
</div>