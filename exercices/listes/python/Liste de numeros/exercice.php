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
                <code class="code_rouge">import random</code><br />
                <br />
                <code class="code_rouge">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_rouge">stores_with_items = []</code><br />
                <code class="code_rouge">stores_without_items = []</code><br />
                <br />
                <code class="code_rouge">def get_store_numbers():</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = input("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif store_number.lower() == 'fin':</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspreturn store_numbers</code><br />
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
                <code class="code_gris">import random</code><br />
                <br />
                <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_gris">stores_with_items = []</code><br />
                <code class="code_gris">stores_without_items = []</code><br />
                <br />
                <code class="code_gris">def get_store_numbers():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = input("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif store_number.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn store_numbers</code><br />
                <br />
                <code class="code_rouge">def check_item_availability():</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspreturn random.choice([True, False])</code><br />
                <br />
                <code class="code_rouge">def check_store(store_numbers):</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspfor store_number in store_numbers:</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = True</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor item in shopping_list:</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif not check_item_availability():</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = False</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif all_items_available:</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspelse:</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
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
                <code class="code_gris">import random</code><br />
                <br />
                <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_gris">stores_with_items = []</code><br />
                <code class="code_gris">stores_without_items = []</code><br />
                <br />
                <code class="code_gris">def get_store_numbers():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = input("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif store_number.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn store_numbers</code><br />
                <br />
                <code class="code_gris">def check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn random.choice([True, False])</code><br />
                <br />
                <code class="code_gris">def check_store(store_numbers):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspfor store_number in store_numbers:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = True</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor item in shopping_list:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif not check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = False</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif all_items_available:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspelse:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
                <br />
                <code class="code_rouge">def ratio_calcul(store_numbers, stores_with_items):</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsptotal_stores = len(store_numbers)</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspstores_with_all_items = len(stores_with_items)</code><br />
                <br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspreturn stores_with_all_items / total_stores * 100</code><br />
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
                <code class="code_gris">import random</code><br />
                <br />
                <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_gris">stores_with_items = []</code><br />
                <code class="code_gris">stores_without_items = []</code><br />
                <br />
                <code class="code_gris">def get_store_numbers():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = input("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif store_number.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn store_numbers</code><br />
                <br />
                <code class="code_gris">def check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn random.choice([True, False])</code><br />
                <br />
                <code class="code_gris">def check_store(store_numbers):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspfor store_number in store_numbers:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = True</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor item in shopping_list:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif not check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = False</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif all_items_available:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspelse:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
                <br />
                <code class="code_gris">def ratio_calcul(store_numbers, stores_with_items):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsptotal_stores = len(store_numbers)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstores_with_all_items = len(stores_with_items)</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn stores_with_all_items / total_stores * 100</code><br />
                <br />
                <code class="code_rouge">def display_list(list_to_display, list_name):</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspprint(f"Liste {list_name}:")</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspfor index, item in enumerate(list_to_display, start=1):</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspprint(f"{index}. {item}")</code><br />
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
                <code class="code_gris">import random</code><br />
                <br />
                <code class="code_gris">shopping_list = ['queue', 'boules', 'tampon']</code><br />
                <code class="code_gris">stores_with_items = []</code><br />
                <code class="code_gris">stores_without_items = []</code><br />
                <br />
                <code class="code_gris">def get_store_numbers():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstore_numbers = []</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_number = input("Entrez le numéro de téléphone du magasin (ou 'fin' pour terminer) : ")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif store_number.lower() == 'fin':</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstore_numbers.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn store_numbers</code><br />
                <br />
                <code class="code_gris">def check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn random.choice([True, False])</code><br />
                <br />
                <code class="code_gris">def check_store(store_numbers):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspfor store_number in store_numbers:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = True</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor item in shopping_list:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif not check_item_availability():</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall_items_available = False</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif all_items_available:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_with_items.append(store_number)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspelse:</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstores_without_items.append(store_number)</code><br />
                <br />
                <code class="code_gris">def ratio_calcul(store_numbers, stores_with_items):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsptotal_stores = len(store_numbers)</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspstores_with_all_items = len(stores_with_items)</code><br />
                <br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspreturn stores_with_all_items / total_stores * 100</code><br />
                <br />
                <code class="code_gris">def display_list(list_to_display, list_name):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspprint(f"Liste {list_name}:")</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbspfor index, item in enumerate(list_to_display, start=1):</code><br />
                <code class="code_gris">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspprint(f"{index}. {item}")</code><br />
                <br />
                <code class="code_rouge">def main():</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspstore_numbers = get_store_numbers()</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspcheck_store(store_numbers)</code><br />
                <br />    
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspdisplay_list(store_numbers, "Number")</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_with_items, "Magasin avec objets")</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspdisplay_list(stores_without_items, "Magasin sans objets")</code><br />
                <br />    
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspratio = ratio_calcul(store_numbers, stores_with_items)</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspprint(f"Le ratio des magasins possédant tous les articles est de {ratio:.2f}%")</code><br />
                <br />
                <code class="code_rouge">if __name__ == "__main__":</code><br />
                <code class="code_rouge">&nbsp&nbsp&nbsp&nbspmain()</code><br />
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
        <code>def get_shopping_list():</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = []</code><br />
        <code>&nbsp&nbsp&nbsp&nbspwhile True:</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspitem = input("Ajoutez un article à la liste de courses (tapez 'fin' pour terminer) : ")</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspif item.lower() == 'fin':</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbreak</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspshopping_list.append(item)</code><br />
        <code>&nbsp&nbsp&nbsp&nbspreturn shopping_list</code><br />
        <br />
        <code>def sort_alphabetically(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspreturn sorted(shopping_list)</code><br />
        <br />
        <code>def sort_by_length(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspreturn sorted(shopping_list, key=len)</code><br />
        <br />
        <code>def display_shopping_list(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspfor index, item in enumerate(shopping_list, start=1):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspprint(f"{index}. {item}")</code><br />
        <br />
        <code>def get_purchased_item(shopping_list):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspdisplay_shopping_list(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbspchoice = int(input("Entrez le numéro de l'article que vous avez acheté : "))</code><br />
        <code>&nbsp&nbsp&nbsp&nbspreturn shopping_list[choice - 1]</code><br />
        <br />
        <code>def remove_purchased_item(shopping_list, item):</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list.remove(item)</code><br />
        <br />
        <code>def main():</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = get_shopping_list()</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_alphabetically(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbspshopping_list = sort_by_length(shopping_list)</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbspwhile shopping_list:</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsppurchased_item = get_purchased_item(shopping_list)</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspremove_purchased_item(shopping_list, purchased_item)</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbspprint("Bravo ! Vous avez terminé vos achats.")</code><br />
        <br />
        <code>if __name__ == "__main__":</code><br />
        <code>&nbsp&nbsp&nbsp&nbspmain()</code><br />
</code><br />
    </div>
</body>
</html>