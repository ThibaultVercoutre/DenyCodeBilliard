<?php

    $q = $db->query('SELECT * FROM languages ORDER BY name');
    while ($languages = $q->fetch()) {
        echo '<div id="'.$languages['name'].'" class="language box" data-language="'.$languages['name'].'">';
        echo '<span>'.ucfirst($languages['name']).'</span></div>';
    }

?>