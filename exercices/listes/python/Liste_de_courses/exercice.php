<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Secret</title>
    <link rel="stylesheet" href="../../../style/style.css">
    <script src="../../../script/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div id="title">Liste de courses</div>
    <div id="sujet">
        <p>Créer une liste de course pour le jeune Deny qui veut apprendre le billiard. 
            Il va devoir acheter une queue, un set de boules et un petit tamon pour frotter le bout de sa queue. 
            Il faudra qu'il y ait :</p>
        <ul>
            <li>une fonction qui demande à l'utilisateur sa liste de course (taper fin pour finir sa liste de course)</li>
            <li>une fonction qui tri sa liste de course par ordre alphabétique</li>
            <li>une fonction qui tri sa liste par la chaine de caractère la plus courte à la plus longue</li>
            <li>une fonction qui demande s'il vient d'acheter une objet parmis les x de la liste (il devra taper 1 - 2 - 3 ... ou X pour choisir un objet, faire une petite présentation graphique) et s'arrête lorsqu'il n'y a plus d'objet dans la liste</li>
        </ul>
    </div>

    <div class="accordion">
        <div class="accordion-header">Etape 1 : Demander à l'utilisateur sa liste de courses</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">get_shopping_list</span>():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspshopping_list = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">while True</span>:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspitem = input("Ajoutez un article à la liste de courses (tapez 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> item.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspshopping_list.append(item)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> shopping_list</code><br />
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
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">sort_alphabetically</span>(shopping_list):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> sorted(shopping_list)</code><br />
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
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">sort_by_length</span>(shopping_list):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> sorted(shopping_list, key=len)</code><br />
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
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">display_shopping_list</span>(shopping_list):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> index, item <span class="code_def">in</span> <span class="code_function_p">enumerate</span>(shopping_list, start=1):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"{index}. {item}")</code><br />
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
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">get_purchased_item</span>(shopping_list):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_shopping_list(shopping_list)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspchoice = int(input("Entrez le numéro de l'article que vous avez achetÃ© : "))</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> shopping_list[choice - 1]</code><br />
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
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">remove_purchased_item</span>(shopping_list, item):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspshopping_list.remove(item)</code><br />
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
                <code><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
                <code>&nbsp&nbsp&nbsp&nbspshopping_list = get_shopping_list()</code><br />
                <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_alphabetically(shopping_list)</code><br />
                <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_by_length(shopping_list)</code><br />
                <br />
                <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">while</span> shopping_list:</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsppurchased_item = get_purchased_item(shopping_list)</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspremove_purchased_item(shopping_list, purchased_item)</code><br />
                <br />
                <code>&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>("Bravo ! Vous avez terminÃ© vos achats.")</code><br />
                <br />
                <code class="code_gris"><span class="code_def">if</span> __name__ == "__main__":</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspmain()</code><br />
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
        <code><span class="code_def">def</span> <span class="code_function_u">get_shopping_list</span>():</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = []</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">while True</span>:</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspitem = input("Ajoutez un article à la liste de courses (tapez 'fin' pour terminer) : ")</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif item.lower() == 'fin':</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspshopping_list.append(item)</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> shopping_list</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">sort_alphabetically</span>(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> sorted(shopping_list)</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">sort_by_length</span>(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> sorted(shopping_list, key=len)</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">display_shopping_list</span>(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> index, item <span class="code_def">in</span> <span class="code_function_p">enumerate</span>(shopping_list, start=1):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"{index}. {item}")</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">get_purchased_item</span>(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspdisplay_shopping_list(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbspchoice = int(input("Entrez le numéro de l'article que vous avez acheté : "))</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> shopping_list[choice - 1]</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">remove_purchased_item</span>(shopping_list, item):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list.remove(item)</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = get_shopping_list()</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_alphabetically(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_by_length(shopping_list)</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">while</span> shopping_list:</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsppurchased_item = get_purchased_item(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspremove_purchased_item(shopping_list, purchased_item)</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>("Bravo ! Vous avez terminÃ© vos achats.")</code><br />
        <br />
        <code><span class="code_def">if</span> __name__ == "__main__":</code><br />
        <code>&nbsp&nbsp&nbsp&nbspmain()</code><br />
</code><br />
    </div>
</body>
</html>