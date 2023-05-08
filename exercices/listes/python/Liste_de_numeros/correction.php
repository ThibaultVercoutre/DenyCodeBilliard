    <div id="title">Liste de numeros</div>
    <div id="sujet">
        <p>Deny a maintenant sa liste de course (simplement enregistré dans une liste au début de la fonction main). 
            Il doit maintenant contacter les magasins par telephone pour savoir s'ils ont ces articles ou pas. 
            Il faudra donc que pour chaque appel, il demande si les articles sont disponible ou non, ce qui fera que :</p>
        <ul>
            <li>Soit au moins un article n'est pas disponible et le numero est rangé dans une liste qui répertorie les magasins ne possédant pas les articles</li>
            <li>Soit tout les articles sont disponible et le numéro est rangé dans une liste qui répertorie les magasins possédant les articles</li>
        </ul>
            <p>Tout les numéros sont renseigné par l'utilisateur dans une liste<p>
            <p>A la fin, il faudra montrer le ratio des magasins possédant les articles par rapport à tout les magasins</p>
    </div>

    <div class="accordion">
        <div class="accordion-header">Etape 1 : Définition de la fonction pour obtenir les numéros de téléphone des magasins :</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">import</span> random</code><br />
                <br />
                <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_gris">stores_with_items = []</code><br />
                <code class="code_gris">stores_without_items = []</code><br />
                <br />
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">get_store_numbers</span>():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">while</span> <span class="code_def">True</span> :</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = <span class="code_function_p">input</span>("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> store_number.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> store_numbers</code><br />
            </div>
            <div class="explication_text">
                <p>Dans cette étape, nous créons la fonction <code>get_store_numbers()</code> qui permet à l'utilisateur d'entrer les numéros de téléphone des magasins. 
                    L'utilisateur entre les numéros un par un, et la boucle se termine lorsque l'utilisateur tape 'fin'. 
                    Les numéros sont stockés dans une liste appelée <code>store_numbers</code> qui est renvoyée à la fin de la fonction.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 2 : Vérification de la disponibilité des articles dans les magasins :</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">check_item_availability</span>():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> random.choice([ <span class="code_def">True</span> ,  <span class="code_def">False</span> ])</code><br />
                <br />
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">check_store</span>(store_numbers):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> store_number <span class="code_def">in</span> store_numbers:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available =  <span class="code_def">True</span> </code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> item <span class="code_def">in</span> shopping_list:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> not check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available =  <span class="code_def">False</span> </code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> all_items_available:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">else</span>:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
            </div>
            <div class="explication_text">
                <p>Dans cette étape, nous utilisons deux fonctions. 
                    La première, <code>check_item_availability()</code>, simule la vérification de la disponibilité d'un article dans un magasin en renvoyant aléatoirement True ou False. 
                    La deuxième fonction, <code>check_store(store_numbers)</code>, itère sur chaque numéro de téléphone des magasins et vérifie si tous les articles de la liste <code>shopping_list</code> sont disponibles dans le magasin. 
                    Si tous les articles sont disponibles, le numéro de téléphone du magasin est ajouté à la liste <code>stores_with_items</code>. 
                    Sinon, il est ajouté à la liste <code>stores_without_items.</code></p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 3 : Calcul du ratio des magasins possédant tous les articles :</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">ratio_calcul</span>(store_numbers, stores_with_items):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsptotal_stores = len(store_numbers)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstores_with_all_items = len(stores_with_items)</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> stores_with_all_items / total_stores * 100</code><br />
            </div>
            <div class="explication_text">
                <p>Dans cette étape, nous créons la fonction <code>ratio_calcul(store_numbers, stores_with_items)</code> pour calculer le ratio des magasins possédant tous les articles par rapport au nombre total de magasins. 
                    Le ratio est calculé en divisant le nombre de magasins avec tous les articles (<code>len(stores_with_items)</code>) par le nombre total de magasins (<code>len(store_numbers)</code>), puis en multipliant par 100 pour obtenir un pourcentage.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 4 : Affichage des listes :</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">display_list</span>(list_to_display, list_name):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"Liste {list_name}:")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> index, item <span class="code_def">in</span> enumerate(list_to_display, start=1):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"{index}. {item}")</code><br />
            </div>
            <div class="explication_text">
                <p>Dans cette étape, nous créons la fonction <code>display_list(list_to_display, list_name)</code> pour afficher les différentes listes. 
                La fonction prend en entrée une liste à afficher (<code>list_to_display</code>) et un nom pour cette liste (<code>list_name</code>). 
                Elle affiche ensuite le nom de la liste suivi des éléments de la liste avec leur indice respectif.</p>
            </div>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">Etape 5 : Création de la fonction principale main() :</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = get_store_numbers()</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspcheck_store(store_numbers)</code><br />
                <br />    
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(store_numbers, "Number")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_with_items, "Magasin avec objets")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_without_items, "Magasin sans objets")</code><br />
                <br />    
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspratio = ratio_calcul(store_numbers, stores_with_items)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"Le ratio des magasins possédant tous les articles est de {ratio:.2f}%")</code><br />
                <br />
                <code class="code_gris"><span class="code_def">if</span> __name__ == "__main__":</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspmain()</code><br />
            </div>
            <div class="explication_text">
                <p>Enfin, nous créons la fonction <code>main()</code> qui rassemble toutes les étapes précédentes pour réaliser le programme. 
                Elle appelle d'abord <code>get_store_numbers()</code> pour obtenir les numéros de téléphone des magasins, 
                puis <code>check_store(store_numbers)</code> pour vérifier la disponibilité des articles dans chaque magasin. 
                Ensuite, elle appelle <code>display_list()</code> pour afficher les différentes listes (numéros de téléphone, magasins avec et sans objets). 
                Enfin, elle calcule le ratio des magasins possédant tous les articles en utilisant <code>ratio_calcul(store_numbers, stores_with_items)</code> et affiche le résultat.</p>
            </div>
        </div>
    </div>


    <div id="code_final" class='code'>
    <code class="code_gris"><span class="code_def">import</span> random</code><br />
        <br />
        <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
        <code class="code_gris">stores_with_items = []</code><br />
        <code class="code_gris">stores_without_items = []</code><br />
        <br />
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">get_store_numbers</span>():</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">while</span> <span class="code_def">True</span> :</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = <span class="code_function_p">input</span>("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> store_number.lower() == 'fin':</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> store_numbers</code><br />
        <br /> 
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">check_item_availability</span>():</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> random.choice([ <span class="code_def">True</span> ,  <span class="code_def">False</span> ])</code><br />
        <br />
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">check_store</span>(store_numbers):</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> store_number <span class="code_def">in</span> store_numbers:</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available =  <span class="code_def">True</span> </code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> item <span class="code_def">in</span> shopping_list:</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> not check_item_availability():</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available =  <span class="code_def">False</span> </code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">break</span></code><br />
        <br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span> all_items_available:</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">else</span>:</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
        <br /> 
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">ratio_calcul</span>(store_numbers, stores_with_items):</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsptotal_stores = len(store_numbers)</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspstores_with_all_items = len(stores_with_items)</code><br />
        <br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> stores_with_all_items / total_stores * 100</code><br />
        <br /> 
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">display_list</span>(list_to_display, list_name):</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"Liste {list_name}:")</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> index, item <span class="code_def">in</span> enumerate(list_to_display, start=1):</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"{index}. {item}")</code><br />
        <br /> 
        <code class="code_gris"><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = get_store_numbers()</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspcheck_store(store_numbers)</code><br />
        <br />    
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(store_numbers, "Number")</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_with_items, "Magasin avec objets")</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_without_items, "Magasin sans objets")</code><br />
        <br />    
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspratio = ratio_calcul(store_numbers, stores_with_items)</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(f"Le ratio des magasins possédant tous les articles est de {ratio:.2f}%")</code><br />
        <br />
        <code class="code_gris"><span class="code_def">if</span> __name__ == "__main__":</code><br />
        <code class="code_gris">&nbsp&nbsp&nbsp&nbspmain()</code><br />  
    </div>