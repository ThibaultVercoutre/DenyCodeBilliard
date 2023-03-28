<?php
if (isset($_GET['exercise_id'])) {
    $exercise_id = $_GET['exercise_id'];
    include '../includes/donnees_exercice.php';
} else {
    echo 'erreur';
}
$sujet_trad = explode('&lt;br /&gt;', htmlspecialchars(nl2br($result['sujet'])));
$code_trad = explode('&lt;br /&gt;', htmlspecialchars(nl2br($result['correction'])));
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
    <div id="title">Exercice <?php echo nl2br($result['name']); ?></div>
    <div><?php
        for($i = 0; $i < count($sujet_trad); $i++) {
            echo '<p>' . $sujet_trad[$i] . '</p>';
        }
    ?></div>
    <div><?php
        for($i = 0; $i < count($code_trad); $i++) {
            echo '<code>' . $code_trad[$i] . '</code><br />';
        }
    ?></div>
    <?php
        for($i = 0; $i < $result['nb_etapes']; $i++) {
            echo '<div class="accordion">';
            echo '<div class="accordion-header">Etape ' . ($i+1) .'</div>';
            $code_trad = explode('&lt;br /&gt;', htmlspecialchars(nl2br($result2[$i]['code'])));
            echo '<div class="accordion-content" id="etape_' . $i .'">';
            echo '<div class="codes_ex">';
            for($j = 0; $j < count($code_trad); $j++) {
                echo '<code>' . $code_trad[$j] . '</code><br />';
            }
            echo '</div>';
            echo '<div>' . $result2[$i]['explication'] . '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</body>
</html>