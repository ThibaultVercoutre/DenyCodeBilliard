<?php

    $q = $db->prepare('SELECT * FROM `languages`');
    $q->execute([]);
    while ($language = $q->fetch()) {
        echo '<option data="'.$language['name'].'">'.$language['name'].'</option>';
    }

?>