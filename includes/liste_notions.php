<?php

    $q = $db->query('SELECT * FROM notions ORDER BY name');
    while ($languages = $q->fetch()) {
        echo '<div class="notion box" data-notion="'.$languages['name'].'">';
        echo '<span>'.$languages['name'].'</span></div>';
    }

?>