<?php

    $q = $db->prepare(' SELECT exercices.name as name
                        FROM `exercices` 
                            JOIN `languages` ON languages.id = exercices.language 
                            JOIN notions ON notions.id = exercices.notion
                            WHERE languages.name = "Python" AND notions.name = "listes"');
    $q->execute([]);
    while ($language = $q->fetch()) {
        echo '<option data="'.$language['name'].'">'.$language['name'].'</option>';
    }

?>