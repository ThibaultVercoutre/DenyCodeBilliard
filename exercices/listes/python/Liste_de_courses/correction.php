
    <div class="accordion">
        <div class="accordion-header">Etape 1 : Demander à l'utilisateur sa liste de courses</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>get_shopping_list()</code> demande à l'utilisateur d'entrer les articles qu'il souhaite ajouter à sa liste de courses. 
                    L'utilisateur doit entrer un article à la fois et taper 'fin' pour terminer. 
                    La boucle while continue de demander des articles jusqu'à ce que l'utilisateur tape 'fin'. 
                    Les articles sont ajoutés à la liste <code>shopping_list</code> au fur et à mesure qu'ils sont saisis.</p>
            </div>
        </div>
    </div>

    <div class="accordion">
        <div class="accordion-header">Etape 2 : Trier la liste de courses par ordre alphabétique</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>sort_alphabetically(shopping_list)</code> prend la liste de courses en argument et retourne une nouvelle liste triée par ordre alphabétique en utilisant la fonction <code>sorted()</code>. 
                    La liste originale n'est pas modifiée.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 3 : Trier la liste de courses par la chaîne de caractères la plus courte à la plus longue</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>sort_by_length(shopping_list)</code> prend également la liste de courses en argument. 
                    Elle utilise à nouveau la fonction <code>sorted()</code> pour trier la liste, mais cette fois avec l'argument key=len. 
                    Cela signifie que les éléments de la liste seront triés en fonction de leur longueur, du plus court au plus long. 
                    La fonction retourne cette nouvelle liste triée.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 4 : Créer une fonction pour afficher la liste de courses</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>display_shopping_list(shopping_list)</code> prend la liste de courses en argument et affiche chaque élément de la liste avec son numéro d'index correspondant (en commençant par 1). 
                    La boucle for avec la fonction <code>enumerate()</code> est utilisée pour parcourir la liste et afficher les éléments avec leur numéro d'index.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 5 : Demander à l'utilisateur s'il vient d'acheter un objet parmi ceux de la liste</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>get_purchased_item(shopping_list)</code> commence par afficher la liste de courses en utilisant la fonction <code>display_shopping_list(shopping_list)</code>. 
                    Ensuite, elle demande à l'utilisateur d'entrer le numéro de l'article qu'il vient d'acheter. 
                    La fonction retourne l'élément correspondant à l'index choisi dans la liste (en ajustant l'index pour tenir compte du fait que les index commencent à 1).</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 6 : Supprimer l'objet acheté de la liste de courses</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>remove_purchased_item(shopping_list, item)</code> prend la liste de courses et l'article à supprimer en arguments. 
                    Elle utilise la méthode <code>remove()</code> pour supprimer l'élément spécifié de la liste.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 7 : Combinez toutes les fonctions pour compléter l'exercice</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>get_shopping_list()</code> demande à l'utilisateur d'entrer les articles qu'il souhaite ajouter à sa liste de courses. 
                    L'utilisateur doit entrer un article à la fois et taper 'fin' pour terminer. 
                    La boucle while continue de demander des articles jusqu'à ce que l'utilisateur tape 'fin'. 
                    Les articles sont ajoutés à la liste <code>shopping_list</code> au fur et à mesure qu'ils sont saisis.</p>
            </div>
        </div>
    </div>


    <div id="code_final" class='code'>
        
    </div>