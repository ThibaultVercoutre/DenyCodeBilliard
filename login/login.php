<?php

include '../includes/database.php';
global $db;

function send_verification_email($email, $token) {
    $subject = "Vérification de votre adresse e-mail";
    $verification_url = "https://denycodebillard.com/login/verify_email.php?token=" . urlencode($token);
    $message = "Cliquez sur le lien suivant pour vérifier votre adresse e-mail : " . $verification_url;
    $headers = "From: noreply@denycodebillard.com";

    mail($email, $subject, $message, $headers);
}

function division_entiere($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $niveau;
}

function reste_division_entiere($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $xp;
}

function xpmax_final($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $xplvl;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny Code Billard - Connexion</title>
    <link rel="stylesheet" href="style/style_login.css">
    <link rel="icon" href="../style/logo/DCB.png" />
    <script src="script/script_login.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header id="hero">
        <div id="header-h">
            <a href="#" id="theme"><span class="material-symbols-outlined">dark_mode</span></a>
        </div>
        <div id="sections">
            <section class="title" id="title1">Connexion</section>
            <section class="title" id="title2">Inscription</section>
            <section id="login">
                <form method="post">
                    <div>
                        <span class="material-symbols-outlined">alternate_email</span>
                        <input type="text" name="Cemail" id="Cemail" placeholder="Entrez votre email ou pseudo"/>
                    </div>
                    <div>
                        <span class="material-symbols-outlined">key</span>
                        <input type="password" name="Cpassword" id="Cpassword" placeholder="Entrez votre mot de passe"/>
                    </div>
                    <a href="forgot_password.php" name="forgot_password" id="forgot_password" value="Mot de passe oublié">Mot de passe oublié</a>
                    <input type="submit" name="send_login" id="send_login" value="Connexion">
                </form>
                <?php
                    if(isset($_POST['send_login'])){
                        extract($_POST);
                        if(!empty($Cemail) && !empty($Cpassword)){
                            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
                            $req->execute(array($Cemail));
                            $user = $req->fetch();

                            $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
                            $req->execute(array($Cemail));
                            $user2 = $req->fetch();

                            if($user || $user2){
                                if($user2){
                                    $user = $user2;
                                }
                                if(password_verify($Cpassword, $user['password'])){
                                    if($user['is_verified'] == 0){
                                        echo "Veuillez vérifier votre adresse e-mail";
                                    }else{
                                        session_start();
                                        $_SESSION['id'] = $user['id'];
                                        $_SESSION['email'] = $user['email'];
                                        $_SESSION['name'] = $user['name'];
                                        $_SESSION['firstname'] = $user['firstname'];
                                        $_SESSION['pseudo'] = $user['pseudo'];
                                        $_SESSION['birthday'] = $user['birthday'];
                                        $_SESSION['admin'] = $user['admin'];
                                        $_SESSION['xp'] = $user['xp'];
                                        $_SESSION['niveau'] = division_entiere($_SESSION['xp'], 500);
                                        $_SESSION['xpfin'] = reste_division_entiere($_SESSION['xp'], 500);
                                        $_SESSION['xpmax'] = xpmax_final($_SESSION['xp'], 500);
                                        $_SESSION['theme'] = $user['theme'];
                                        header('Location: ../index.php');
                                    }
                                }else{
                                    echo "Mot de passe incorrect";
                                }
                            }else{
                                echo "Email incorrect";
                            }
                        }else{
                            echo "Veuillez remplir tous les champs";
                        }
                    }
                ?>
            </section>
            <section id="signin">
                <form method="post">
                    <div>
                        <span class="material-symbols-outlined">alternate_email</span>
                        <input type="text" name="Iemail" id="email" placeholder="Entrez votre email"/>
                    </div>
                    <div>
                        <span class="material-symbols-outlined">key</span>
                        <input type="password" name="Ipassword" id="password" placeholder="Entrez votre mot de passe"/>
                    </div>
                    <div>
                        <span class="material-symbols-outlined">key</span>
                        <input type="password" name="IpasswordC" id="passwordC" placeholder="Confirmez votre mot de passe"/>
                    </div>
                    <div>
                        <span class="material-symbols-outlined">abc</span>
                        <input type="text" name="Iname" id="name" placeholder="Entrez votre nom">
                    </div>
                    <div>
                        <span class="material-symbols-outlined">abc</span>
                        <input type="text" name="Ifirstname" id="firstname" placeholder="Entrez votre prénom">
                    </div>
                    <div>
                        <span class="material-symbols-outlined">abc</span>
                        <input type="text" name="Ipseudo" id="pseudo" placeholder="Entrez votre pseudo">
                    </div>
                    <div>
                        <span class="material-symbols-outlined">cake</span>
                        <input type="date" name="Ibirthday" id="birthday" placeholder="Entrez votre date de naissance">
                    </div>
                    <input type="submit" name="send_signin" id="send_signin" value="Inscription">
                </form>
                <?php
                    extract($_POST);
                    if(isset($_POST['send_signin'])){
                        extract($_POST);

                        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
                        $req->execute(array($Ipseudo));
                        $user = $req->fetch();
                        if($user){
                            echo "Pseudo déjà utilisé";
                        }else{
                            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
                            $req->execute(array($Iemail));
                            $user = $req->fetch();
                            if($user){
                                echo "Email déjà utilisé";
                            }else{
                                if(!empty($Iemail) && !empty($Ipassword) && !empty($Iname) && !empty($Ifirstname) && !empty($Ipseudo) && !empty($Ibirthday)){
                                    if($Ipassword == $IpasswordC){
                                        $option = [
                                            'cost' => 12,
                                        ];
                                        
                                        $verification_token = bin2hex(random_bytes(16));
                                        $verification_url = "https://denycodebillard.com/login/verify_email.php?token=" . $verification_token;
                                            // . urlencode($verification_token)
                                        $Ihashpass = password_hash($Ipassword, PASSWORD_BCRYPT, $option);
                                        $req = $db->prepare('INSERT INTO users(email, password, name, firstname, pseudo, birthday, verification_token, is_verified) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                                        $req->execute(array($Iemail, $Ihashpass, $Iname, $Ifirstname, $Ipseudo, $Ibirthday, $verification_token, 0));
                                        
                                        include ('../includes/send_mail_verif.php');
                                        //send_verification_email($Iemail, $verification_token);
                                    }
                                }else{
                                    echo "Veuillez remplir tous les champs";
                                }
                            }
                        }
                    }
                ?>
            </section>
        </div>
    </header>
</body>
</html>