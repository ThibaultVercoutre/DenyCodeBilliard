
    <div id="title">Trouver la boule</div>
    <div id="sujet">
        <p>Notre jeune Deny a besoin de trouver la boule blanche pour jouer au billard américain.
            Il va devoir alors regarder une par une les boules de son jeu de billard pour trouver la boule blanche.
            Pour cela il aura une liste de boules de billard avec leur couleur et leur numéro. La boule blanche et la boule noire
            auront 0 comme numéro. Il y aura donc 16 boules de billard dans la liste.
            Il y aura donc la fonction suivante :
        </p>
        <ul>
            <li>Une fonction qui cherche la boule de couleur blanche</li>
        </ul>
    </div>

    <div class="accordion">
        <div class="accordion-header">Étape 1 : Création de la fonction permmettant de trouver la boule</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>find</code> prend trois arguments : 
                    une liste boules, une chaîne de caractères la_boule et un entier numero. 
                    Cette fonction cherche dans la liste boules un élément dont la première partie correspond à la_boule 
                    et la deuxième partie correspond à numero. Si elle trouve un tel élément, elle renvoie son index, 
                    sinon elle renvoie -1.</p>
            </div>
        </div>
    </div>

    <div class="accordion">
        <div class="accordion-header">Étape 2 : Création et mélange de la liste de boules</div>
        <div class="accordion-content" id="etape_' . $i .'">
            <div class="codes_ex code">
                
            </div>
            <div class="explication_text">
                <p>La fonction <code>main()</code> contient la logique principale du programme. 
                    Elle crée une liste boules contenant plusieurs sous-listes, 
                    chacune représentant une boule avec une couleur et un numéro.
                    Après avoir créé la liste boules, on utilise <code>random.shuffle(boules)</code>
                    pour mélanger aléatoirement les éléments de la liste boules.</p>
            </div>
        </div>
    </div>

    <div id="code_final" class='code'>
        
    </div>