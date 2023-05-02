<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny Code Billard - Trouver la boule</title>
    <link rel="icon" href="../../../../style/logo/DCB.png" />
    <link rel="stylesheet" href="../../../style/style.css">
    <script src="../../../script/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
</head>
<body>
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
                <code><span class="code_def">def</span> <span class="code_function_u">find</span>(boules, la_boule, numero):</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> i <span class="code_def">in</span> <span class="code_function_p">range</span>(<span class="code_function_p">len</span>(boules)):</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span>(boules[i][0] == la_boule <span class="code_def">and</span> boules[i][1] == numero):</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> i</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> -1</code><br />
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
                <code><span class="code_def">import</span> random</code><br />
                <br />
                <code>...</code><br />
                <br />
                <code><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
                <code>&nbsp&nbsp&nbsp&nbspboules = [["Jaune", 1], ["Jaune", 2], ["Jaune", 3], ["Jaune", 4], ["Jaune", 5], ["Jaune", 6], ["Jaune", 7],</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp["Rouge", 1], ["Rouge", 2], ["Rouge", 3], ["Rouge", 4], ["Rouge", 5], ["Rouge", 6], ["Rouge", 7],</code><br />
                <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp["Noire", 0], ["Blanche", 0]]</code><br />
                <br />
                <code>&nbsp&nbsp&nbsp&nbsprandom.shuffle(boules)</code><br />
                <br />
                <code>&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(find(boules, "Blanche", 0))</code><br />
                <br />    
                <code><span class="code_def">if</span> __name__ == "__main__":</code><br />
                <code>&nbsp&nbsp&nbsp&nbspmain()</code><br />
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
        <code><span class="code_def">import</span> random</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">find</span>(boules, la_boule, numero):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">for</span> i <span class="code_def">in</span> <span class="code_function_p">range</span>(<span class="code_function_p">len</span>(boules)):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">if</span>(boules[i][0] == la_boule <span class="code_def">and</span> boules[i][1] == numero):</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> i</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_def">return</span> -1</code><br />
        <br />
        <code><span class="code_def">def</span> <span class="code_function_u">main</span>():</code><br />
        <code>&nbsp&nbsp&nbsp&nbspboules = [["Jaune", 1], ["Jaune", 2], ["Jaune", 3], ["Jaune", 4], ["Jaune", 5], ["Jaune", 6], ["Jaune", 7],</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp["Rouge", 1], ["Rouge", 2], ["Rouge", 3], ["Rouge", 4], ["Rouge", 5], ["Rouge", 6], ["Rouge", 7],</code><br />
        <code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp["Noire", 0], ["Blanche", 0]]</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbsprandom.shuffle(boules)</code><br />
        <br />
        <code>&nbsp&nbsp&nbsp&nbsp<span class="code_function_p">print</span>(find(boules, "Blanche", 0))</code><br />
        <br />
        <code><span class="code_def">if</span> __name__ == "__main__":</code><br />
        <code>&nbsp&nbsp&nbsp&nbspmain()</code><br />
    </div>
</body>
</html>