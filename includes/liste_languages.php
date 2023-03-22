<?php

    $q = $db->query('SELECT * FROM languages ORDER BY name');
    while ($languages = $q->fetch()) {
        echo '<div class="language box" data-language="'.$languages['name'].'">';
        echo '<span>'.$languages['name'].'</span></div>';
    }

?>