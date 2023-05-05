<?php

include 'includes/database.php';
global $db;

$_SESSION['id'] = 0;
$_SESSION['email'] = "";
$_SESSION['name'] = "";
$_SESSION['firstname'] = "";
$_SESSION['pseudo'] = "";
$_SESSION['birthday'] = "";
$_SESSION['admin'] = 0;
$_SESSION['xp'] = 0;
$_SESSION['niveau'] = 0;
$_SESSION['xpfin'] = 0; 
$_SESSION['xpmax'] = 500;
$_SESSION['theme'] = 0;

session_start();

function get_xp_percentage() {
    $xp = isset($_SESSION['xpfin']) ? $_SESSION['xpfin'] : 0;
    $xp_max = isset($_SESSION['xpmax']) ? $_SESSION['xpmax'] : 1;
    
    return ($xp / $xp_max) * 100;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny Code Billard</title>
    <meta name="description" content="La meta description de la page."/>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="style/logo/DCB.png" />
    <script src="script/script.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

</head>
<body <?php if (isset($_SESSION['theme']) && $_SESSION['theme'] == 1): echo "onload='changeTheme();'"; endif;?>>
    <!-- <div id="header-h">
        <a href="#" id="theme"><span class="material-symbols-outlined">dark_mode</span></a>
        <?php if(empty($_SESSION['id'])){ ?>
            <a href="login\login.php" id="sign">S'inscrire</a>
        <?php }else{ ?>
            <a href="login\logout.php" id="deconnexion"><span><?php echo $_SESSION['pseudo'] ?></span></a>
        <?php } ?>
    </div> -->
    <header id="hero">
        <div class="hero-content">
            <div id="header-h">
                <h1 href="#" id="version">V1.2</h1>
                <?php if(!empty($_SESSION['id'])){ ?>
                    <p class="hexagon-text"><?php echo $_SESSION['niveau']; ?></p>
                    <div class="xp-bar-container">
                        <div class="xp-bar" style="width: <?php echo get_xp_percentage(); ?>%;">
                            <div id="particules"></div>
                        </div>
                    </div>
                <?php } ?>
                <a href="#" id="theme" data="<?php if (isset($_SESSION['theme'])): echo $_SESSION['theme']; else: echo 0; endif; ?>" onclick="miseajourBDDtheme(<?php if (isset($_SESSION['id'])): echo $_SESSION['id']; else: echo 0; endif; ?>)"><span class="material-symbols-outlined">dark_mode</span></a>
                <?php if(empty($_SESSION['id'])){ ?>
                    <a href="login\login.php" id="sign">S'inscrire</a>
                <?php }else{ ?>
                    <a href="login\logout.php" id="deconnexion"><span><?php echo $_SESSION['pseudo'] ?></span></a>
                <?php } ?>
            </div>
            <!-- <span class="material-symbols-outlined">dark_mode</span> -->
            <h1 class="hero-title" id="title">> Deny Code Billard</h1>
            <div class="hero-navigation">
                <a href="#" class="nav-link" data-target="actualites">Actualités</a>
                <a href="#" class="nav-link" data-target="languages">Langages</a>
                <a href="#" class="nav-link" data-target="concepts">Notions</a>
                <a href="#" class="nav-link" data-target="rankings">Classements</a>
                <a href="#" class="nav-link" data-target="leaderboard">LeaderBoard</a>
                <a href="#" class="nav-link" data-target="exercise-of-the-week">Exercice de la semaine</a>
                <?php if(!empty($_SESSION['id'])){?><a href="#" class="nav-link" data-target="user-account">Compte utilisateur</a><?php } ?>
                <?php if(!empty($_SESSION['id']) && $_SESSION['admin'] == 1){?><a href="#" class="nav-link" data-target="admin-account">Compte admin</a><?php } ?>
            </div>
        </div>
        <!-- <button id="code-button">CODE</button>
        <div id="code">
            
        </div>
        <script>
        const sidebarToggle = document.getElementById('code-button');
        const mainContent = document.querySelector('body');
        const mainContent2 = document.getElementById('hero');
        
        sidebarToggle.addEventListener('click', () => {
            mainContent.classList.toggle('visible');
            mainContent2.classList.toggle('visible');
        });
        </script> -->
    </header>
    
    <!-- Vos sections ici -->
    <section id="actualites" class="content-section">
        <?php include "pages/actu.php"; ?>
    </section>

    <section id="languages" class="content-section">
        <?php include "pages/languages.php"; ?>
    </section>
    
    <section id="concepts" class="content-section">
        <?php include "pages/concepts.php"; ?>
    </section>

    <section id="rankings" class="content-section">
        <?php include "pages/rankings.php"; ?>
    </section>

    <section id="exercise-of-the-week" class="content-section">
        <?php include "pages/week_ex.php"; ?>
    </section>

    <section id="leaderboard" class="content-section">
        <?php include "pages/leaderboard.php"; ?>
    </section>
    
    <?php if(!empty($_SESSION['id'])){?>

    <section id="user-account" class="content-section">
        <?php include "pages/user_account.php"; ?>
    </section>
    <?php } ?>

    <?php if(!empty($_SESSION['admin']) && $_SESSION['admin'] == 1){?>

    <section id="admin-account" class="content-section">
        <?php include "pages/admin_account.php"; ?>
    </section>
    <?php } ?>
</body>

</html>