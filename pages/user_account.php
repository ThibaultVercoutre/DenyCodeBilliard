<?php

// function get_xp_percentage() {
//     $xp = isset($_SESSION['xpfin']) ? $_SESSION['xpfin'] : 0;
//     $xp_max = isset($_SESSION['xpmax']) ? $_SESSION['xpmax'] : 1;
    
//     return ($xp / $xp_max) * 100;
// }

?>

<div class="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>
<!-- Contenu du compte utilisateur -->
<div class="profile-container">
    <div class="profile-image">
        <img src="style/images_profils/profil_defaut.webp" alt="Photo de profil">
    </div>
    <div class="profile-info">
        <h2><span id="change_name" class="edit_profil material-symbols-outlined" onclick=chage_name()>edit</span><span id="name"><?php echo $_SESSION['name'] . "</span>&nbsp<span id='firstname'>" . $_SESSION['firstname']; ?></span><span id="change_firstname" class="edit_profil material-symbols-outlined" onclick=change_firstname()>edit</span></h2>
        
        <p><strong>Niveau :&nbsp</strong> <?php echo $_SESSION['niveau']; ?></p>
        <div class="xp-bar-container">
            <div class="xp-bar" style="width: <?php echo get_xp_percentage(); ?>%;">
            </div>
        </div>
        
        <p><strong>Email :&nbsp</strong> <span id="mail"><?php echo $_SESSION['email']; ?></span><span id="change_email" class="edit_profil material-symbols-outlined" onclick=change_email()>edit</span></p>
        <p><strong>Pseudo :&nbsp</strong> <?php echo $_SESSION['pseudo']; ?></p>
        <p><strong>Date de naissance :&nbsp</strong> <?php echo $_SESSION['birthday']; ?></p>
        <div id="change_mdp" onclick=change_mdp()>Modifier le mot de passe</div>
    </div>
</div>

<div class="profile-change" id="modif_name">
    <input type="text" name="new_name" id="new_name" placeholder="Entrez votre nouveau nom">
    <input type="button" name="send_name" id="send_name" value="Changer nom" onclick="envoie_name(<?php if (isset($_SESSION['id'])): echo $_SESSION['id']; else: echo 0; endif; ?>)">
</div>

<div class="profile-change" id="modif_firstname">
    <input type="text" name="new_firstname" id="new_firstname" placeholder="Entrez votre nouveau prenom">
    <input type="button" name="send_firstname" id="send_firstname" value="Changer prenom" onclick="envoie_firstname(<?php if (isset($_SESSION['id'])): echo $_SESSION['id']; else: echo 0; endif; ?>)">
</div>

<div class="profile-change" id="modif_email">
    <input type="text" name="new_mail" id="new_mail" placeholder="Entrez votre nouveau mail">
    <input type="button" name="send_mail" id="send_mail" value="Changer mail" onclick="envoie_mail(<?php if (isset($_SESSION['id'])): echo $_SESSION['id']; else: echo 0; endif; ?>)">
</div>

<div class="profile-change" id="modif_mdp">
    <input type="text" name="old_mdp" id="old_mdp" placeholder="Entrez votre mot de passe">
    <input type="button" name="send_mdp" id="send_mdp" value="Changer mot de passe" onclick="envoie_mdp(<?php if (isset($_SESSION['id'])): echo $_SESSION['id']; else: echo 0; endif; ?>)">
</div>