<?php

    $q = $db->prepare('SELECT * FROM `notions`');
    $q->execute([]);
    while ($notion = $q->fetch()) {
        echo '<option data="'.$notion['name'].'">'.$notion['name'].'</option>';
    }

?>