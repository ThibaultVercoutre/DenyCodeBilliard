// ================================================
// Scrolling desactively
// ================================================  

// document.addEventListener('wheel', function (event) {
//     event.preventDefault();
// }, { passive: false });

// const minHeight = Math.round(document.getElementById('hero').offsetHeight);

// console.log(minHeight);

// window.addEventListener('wheel', function (event) {
//     height = Math.round(window.pageYOffset);
//     console.log(height, minHeight);
//   if (height > minHeight) {
//     event.preventDefault();
//   }
// }, { passive: false });

// ================================================
// Nav Bar
// ================================================  

const navLinks = document.querySelectorAll('.nav-link');
const contentSections = document.querySelectorAll('.content-section');
const accueils = document.querySelectorAll('.accueil');

function cacheSections(){
    contentSections.forEach((section) => {
        section.style.display = 'none';
    });
}

cacheSections();

function scrollSection(windowHeight){
    window.scrollBy({
        top: windowHeight,
        left: 0,
        behavior: 'smooth'
    });
}

let Ecriture;

function handleClick(event) {
    event.preventDefault();

    // Désactive temporairement les événements de clic sur les éléments de la navbar
    navLinks.forEach(function (item) {
        item.style.pointerEvents = "none";
    });

    // Simule l'animation avec une durée de 1 seconde (1000 ms)
    setTimeout(function () {
        // Réactive les événements de clic sur les éléments de la navbar après l'animation
        navLinks.forEach(function (item) {
            item.style.pointerEvents = "auto";
        });
    }, 3000);
}

navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        handleClick(e);
        clearInterval(IntervalleTitre);
        clearTimeout(Ecriture);
        setTimeout(function() {
            eraseWriter(title, "> " + title.innerHTML.slice(4, title.innerHTML.length), 43);
        }, 100);
        setTimeout(function() {
            typeWriter(title, link.innerHTML, 43);
        }, 1300);
        setTimeout(function() {
            cacheSections();
            document.getElementById(e.target.getAttribute('data-target')).style.display = 'block';
            scrollSection(window.innerHeight);
        }, 2000);
    });
});

// navLinks.forEach((link) => {
//     link.addEventListener('click', (e) => {
//         cacheSections();
//         document.getElementById(e.target.getAttribute('data-target')).style.display = 'block';
//         
//         setTimeout(function() {
//             document.querySelector('body').style.transform = 'translateY(-100vh)';
//         }, 300);
//     });
// });

const Btheme = document.getElementById('theme');
const CSShero = document.getElementById("hero");
const Langages = document.querySelectorAll(".box");
const SpanLangages = document.querySelectorAll(".language span");
const Sections = document.querySelectorAll(".content-section");

Btheme.addEventListener('click', (e) => {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.innerHTML = '<span class="material-symbols-outlined">light_mode</span>';

        CSShero.style.background = "linear-gradient(-45deg, #530808, #870505, #1e1b1b, #000000, #160265, #06025c)";
        CSShero.style.animation = "gradient 10s ease infinite";
        CSShero.style.backgroundSize = "400% 400%";
        CSShero.style.color = "rgb(244,237,222)";
        
        Sections.forEach(section => {
            section.style.background = "linear-gradient(-45deg, #530808, #870505, #1e1b1b, #000000, #160265, #06025c)";
            section.style.animation = "gradient 10s ease infinite";
            section.style.backgroundSize = "400% 400%";
            section.style.color = "rgb(244,237,222)";
        });

        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
        for (let i = 0; i < SpanLangages.length; i++) {
            Langages[i].style.backgroundColor = "black";
            Langages[i].style.border = '3px solid white';
            SpanLangages[i].style.color = 'white';
            SpanLangages[i].style.background = "linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0))";
        }
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.innerHTML = '<span class="material-symbols-outlined">dark_mode</span>';

        CSShero.style.background = "linear-gradient(-45deg, #e7bc2f, #e86209, #52df57, #19aa0b, #1891bd, #2920e0)";
        CSShero.style.animation = "gradient 10s ease infinite";
        CSShero.style.backgroundSize = "400% 400%";
        CSShero.style.color = "#000000";

        Sections.forEach(section => {
            section.style.background = "linear-gradient(-45deg, #e7bc2f, #e86209, #52df57, #19aa0b, #1891bd, #2920e0)";
            section.style.animation = "gradient 10s ease infinite";
            section.style.backgroundSize = "400% 400%";
            section.style.color = "#000000";
        });

        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";
        for (let i = 0; i < SpanLangages.length; i++) {
            Langages[i].style.backgroundColor = "white";
            Langages[i].style.border = '3px solid black';
            SpanLangages[i].style.color = 'black';
            SpanLangages[i].style.background = "linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0))";
        }
    };
});

Btheme.addEventListener("mouseover", function() {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";  
    };
});

Btheme.addEventListener("mouseout", function() {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";  
    };
});

const Bcode = document.getElementById('code-button');

function centerButtonVertically() {
  const windowHeight = window.innerHeight;
  const buttonHeight = Bcode.offsetHeight;
  const offset = (windowHeight - buttonHeight) / 2;
  Bcode.style.top = `${offset}px`;
}

// Centre le bouton verticalement au chargement de la page
centerButtonVertically();

// Centre le bouton verticalement lors du redimensionnement de la fenêtre
window.addEventListener('resize', centerButtonVertically);

accueils.forEach((accueil) => {
    accueil.addEventListener('click', (e) => {
        index = 0;
        title.innerHTML = "> Deny Code Billard";
        scrollSection(0);
        IntervalleTitre = setInterval(function() {
            let index1 = (index) % messages.length;
            let index2 = (index + 1) % messages.length;
            const message = messages[index1];
            const message2 = messages[index2];
            title.innerHTML = "";
            // setTimeout(function() {
                eraseWriter(title, message, 43);
            // }, 3000);
            Ecriture = setTimeout(function() {
                typeWriter(title, message2.slice(2, message2.length), 43);
            }, 1300);
            index++;
        }, 5000);
    }); 
});

// ================================================
// afficher Languages -> Notions -> Exercices
// ================================================

let notionsLang = document.querySelector('#languages .notions-container');
let exercicesLang = document.querySelector('#languages .exercises-container');

function affLanguagesToLanguages(e, sec){
    if(sec == 'languages'){
        BlanguagesLang.forEach((langage) => {
            if(e == 0){
                langage.style.display = 'none';
            }else{
                langage.style.display = 'flex';
            }
                
        });
    }
}

function affNotionsToLanguages(e, sec){
    if(sec == 'languages'){
        BnotionsLang.forEach((notion) => {
            if(e == 0){
                notion.style.display = 'none';
            }else{
                notion.style.display = 'flex';
            }
                
        });
    }
}

function createNotionsToLanguages(e) {
    var arbo = document.querySelector('#arbo_lang');
    if(arbo.childNodes.length == 0){
        arbo.innerHTML += '<span type="slash" class="arbo">/</span><span class="lang arbo" data="' + e + '" onclick="languagesLanguageArbo()">Language : ' + e + '</span>';
    }

    var params = new URLSearchParams();
    params.append('language', e);

    fetch('fetch/liste_notions_language.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            notionsLang.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                notionsLang.innerHTML += '<div class="notion box" data-language="'+e+'" data-notion="'+result[i]["name"]+'" language='+e+' onclick="FnotionsLang(\''+result[i]["name"]+'\')"><span>'+result[i]["name"]+'</span></div>'
        }
    })   
}

function createExercicesToNotions(e1, e2) {
    var arbo = document.querySelector('#arbo_lang');
    if(arbo.childNodes.length == 2){
        arbo.innerHTML += '<span type="slash" class="arbo">/</span><span class="not arbo" data="' + e2 + '" onclick="languagesNotionArbo()">Notion : ' + e2 + '</span>';
    }
    var params = new URLSearchParams();
    params.append('language', e1);
    params.append('notion', e2);

    fetch('fetch/liste_exercices_notion.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            exercicesLang.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercicesLang.innerHTML += '<a onclick="sendexercice(' + result[i]["id"] + ')" target="_blank" class="button_exercice" href="exercices/' + e2 + '/' + e1 + '/' + result[i]["name"].replaceAll(" ","_") + '/exercice.php?exercice_id=' + result[i]["id"] + '" data-id="' + result[i]["id"] + '"><div class="exercice box" data-language="'+e1+'"><span>'+result[i]["name"]+'</span></div>'
            }
        })
        
}

const BlanguagesLang = document.querySelectorAll('#languages .language');
var BnotionsLang = document.querySelectorAll('#languages .notion');
var BexercicesLang = document.querySelectorAll('#languages .exercice');

BlanguagesLang.forEach((language) => {
    language.addEventListener('click', () => {
        affLanguagesToLanguages(0, 'languages');
        language.style.display = 'flex';
        createNotionsToLanguages(language.getAttribute('data-language'));
        document.querySelectorAll('#languages .languages-container')[0].style.display = 'none'; 
        BnotionsLang = document.querySelectorAll('#languages .notion');
    });
});

function FnotionsLang(notion){
    notion = document.querySelector('#languages .notion[data-notion="'+notion+'"]');
    BnotionsLang = document.querySelectorAll('#languages .notion');
    let exercicesLang = document.querySelector('#languages .exercises-container');
    if(exercicesLang.innerHTML == ''){
        affNotionsToLanguages(0, 'languages');
        notion.style.display = 'flex';
        createExercicesToNotions(notion.getAttribute('data-language'), notion.firstChild.textContent);
        document.querySelectorAll('#languages .notions-container')[0].style.display = 'none';
    }
}

function languagesExerciceArbo(){
    exercicesLang.innerHTML = '';
}

function languagesNotionArbo(){
    languagesExerciceArbo();
    BnotionsLang.forEach((notion) => {
        notion.style.display = 'flex';
    });
    if(document.querySelector('#arbo_lang').childNodes.length == 4){
        document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[3]);
        document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[2]);
    }
    document.querySelectorAll('#languages .notions-container')[0].style.display = 'flex';
}

function languagesLanguageArbo(){
    languagesNotionArbo();
    BlanguagesLang.forEach((language) => {
        language.style.display = 'flex';
    });
    document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[1]);
    document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[0]);
    notionsLang.innerHTML = '';
    document.querySelectorAll('#languages .languages-container')[0].style.display = 'flex';
}

// ================================================
// afficher Notions -> Languages -> Exercices
// ================================================

let languagesNot = document.querySelector('#concepts .languages-container');
let exercicesNot = document.querySelector('#concepts .exercises-container');

function affNotionsToNotions(e, sec){
    if(sec == 'notions'){
        BnotionsNot.forEach((notion) => {
            if(e == 0){
                notion.style.display = 'none';
            }else{
                notion.style.display = 'flex';
            }
                
        });
    }
}

function affLanguagesToNotions(e, sec){
    if(sec == 'notions'){
        BlanguagesNot.forEach((language) => {
            if(e == 0){
                language.style.display = 'none';
            }else{
                language.style.display = 'flex';
            }
                
        });
    }
}

function createLanguagesToNotions(e) {
    var arbo = document.querySelector('#arbo_concept');
    if(arbo.childNodes.length == 0){
        arbo.innerHTML += '<span type="slash" class="arbo">/</span><span class="not arbo" data="' + e + '" onclick="notionsNotionArbo()">Notion : ' + e + '</span>';
    }

    var params = new URLSearchParams();
    params.append('notion', e);

    fetch('fetch/liste_languages_notion.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            languagesNot.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                languagesNot.innerHTML += '<div class="language box" data-notion="'+e+'" data-language="'+result[i]["name"]+'" language='+e+' onclick="FlanguagesNot(\''+result[i]["name"]+'\')"><span>'+result[i]["name"]+'</span></div>'
            }
        })   
}

function createExercicesToLanguages(e1, e2) {
    var arbo = document.querySelector('#arbo_concept');
    if(arbo.childNodes.length == 2){
        arbo.innerHTML += '<span type="slash" class="arbo">/</span><span class="lang arbo" data="' + e2 + '" onclick="notionsLanguageArbo()">Language : ' + e2 + '</span>';
    }

    var params = new URLSearchParams();
    params.append('notion', e1);
    params.append('language', e2);

    fetch('fetch/liste_exercices_language.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            exercicesNot.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercicesNot.innerHTML += '<a onclick="sendexercice(' + result[i]["id"] + ')" target="_blank" class="button_exercice" href="exercices/' + e1 + '/' + e2 + '/' + result[i]["name"].replaceAll(" ","_") + '/exercice.php?exercice_id=' + result[i]["id"] + '"><div class="exercice box" data-notion="'+e1+'"><span>'+result[i]["name"]+'</span></div></a>'
            }
        })
        
}

var BlanguagesNot = document.querySelectorAll('#concepts .language');
const BnotionsNot = document.querySelectorAll('#concepts .notion');
var BexercicesNot = document.querySelectorAll('#concepts .exercice');

BnotionsNot.forEach((notion) => {
    notion.addEventListener('click', () => {
        affNotionsToNotions(0, 'notions');
        notion.style.display = 'flex';
        createLanguagesToNotions(notion.getAttribute('data-notion'));
        document.querySelectorAll('#concepts .notions-container')[0].style.display = 'none'; 
    });
});

function FlanguagesNot(language){
    language = document.querySelector('#concepts .language[data-language="'+language+'"]');
    BlanguagesNot = document.querySelectorAll('#concepts .language');
    let exercicesNot = document.querySelector('#concepts .exercises-container');
    if(exercicesNot.innerHTML == ''){
        affLanguagesToNotions(0, 'notions');
        language.style.display = 'flex';
        createExercicesToLanguages(language.getAttribute('data-notion'), language.firstChild.textContent);
        document.querySelectorAll('#concepts .languages-container')[0].style.display = 'none';
    }
}

function notionsExerciceArbo(){
    exercicesNot.innerHTML = '';
}

function notionsLanguageArbo(){
    notionsExerciceArbo()
    BlanguagesNot.forEach((language) => {
        language.style.display = 'flex';
    });
    if(document.querySelector('#arbo_concept').childNodes.length == 4){
        document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[3]);
        document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[2]);
    }
    document.querySelectorAll('#concepts .languages-container')[0].style.display = 'flex';
}

function notionsNotionArbo(){
    notionsLanguageArbo()
    BnotionsNot.forEach((notion) => {
        notion.style.display = 'flex';
    });
    document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[1]);
    document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[0]);
    languagesNot.innerHTML = '';
    document.querySelectorAll('#concepts .notions-container')[0].style.display = 'flex';
}

// ================================================
// Creation exercice
// ================================================

let creer_exercice = document.getElementById('create_exo');

if(creer_exercice != null){
creer_exercice.addEventListener('click', () => {
    let données = {
        "titre" : document.getElementById('exo_title').value,
        "language" : document.getElementById('ajout_language').value,
        "notion" : document.getElementById('ajout_notion').value
    };

    document.getElementById('exo_title').value = '';

    var params = new URLSearchParams();
    params.append('données', JSON.stringify(données));

    fetch('fetch/envoie_new_exercice.php', {
        method: 'POST',
        body: params
    }).then(response => response.text())
});
};

// ================================================
// Ajout Notion / Exercice
// ================================================

let Addnot = document.getElementById('create_not');
let AddLang = document.getElementById('create_lang');

function sendNotOrLang(p){
    fetch('fetch/envoie_new_not_lang.php', {
        method: 'POST',
        body: p
    }).then(response => response.text())
}

if(Addnot != null){
Addnot.addEventListener('click', () => {
    let newNot = document.getElementById('not_title').value;
    let listeNot = document.querySelectorAll('#ajout_notion option');

    var compteur = 0;
    for(let i = 0; i < listeNot.length; i++){
        if(listeNot[i].value.match(newNot) == null && newNot.match(listeNot[i].value) == null){
            compteur++;
        }
    }

    if(listeNot.length == compteur){
        var params = new URLSearchParams();
        params.append('type', 1);
        params.append('name', newNot);

        sendNotOrLang(params);
        
        document.getElementById('not_title').value = '';
    }else {
        alert('Cette notion existe déjà');
    }
});
}

if(AddLang != null){
AddLang.addEventListener('click', () => {
    let newLang = document.getElementById('lang_title').value;
    let listelang = document.querySelectorAll('#ajout_language option');

    var params = new URLSearchParams();
    params.append('type', 2);
    params.append('name', newLang);

    var compteur = 0;
    for(let i = 0; i < listelang.length; i++){
        var lang = listelang[i].value;
        if(lang.match(newLang) == null){
            compteur++;
        }
    }

    if(listelang.length == compteur){
        var params = new URLSearchParams();
        params.append('type', 2);
        params.append('name', newLang);

        sendNotOrLang(params);

        document.getElementById('lang_title').value = '';
    }else {
        alert('Ce language existe déjà');
    }
});
}

const textareas = document.querySelectorAll('textarea');

textareas.forEach(textarea => {
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});


// ================================================
// Ouvrir exercice
// ================================================


function sendexercice(exerciceid) {
    var params = new URLSearchParams();
    params.append('exerciceid', exerciceid);

    fetch('fetch/add_visit.php', {
        method: 'POST',
        body: params
    })
};

// ================================================
// CSS
// ================================================

function eraseWriter(element, message, speed) {
    let i = 0;
    TextA = message;
    element.innerHTML = TextA;
    i++;
    const timer = setInterval(function() {
      if (i < message.length - 1) {
        TextA = TextA.slice(0, -1);
        element.innerHTML = TextA;
        i++;
      } else {
        clearInterval(timer);
      }
    }, speed);
}

function typeWriter(element, message, speed) {
    let i = 0;
    element.innerHTML += message.charAt(i);
    i++;
    const timer = setInterval(function() {
      if (i < message.length) {
        element.innerHTML += message.charAt(i);
        i++;
      } else {
        clearInterval(timer);
      }
    }, speed);
}
  
const title = document.getElementById('title');
const messages = ["> Deny Code Billard", "> Apprenez avec Deny", "> Codez avec envie", "> Un billard comme ami"];
let index = 0;
  
let IntervalleTitre = setInterval(function() {
    let index1 = (index) % messages.length;
    let index2 = (index + 1) % messages.length;
    const message = messages[index1];
    const message2 = messages[index2];
    title.innerHTML = "";
    // setTimeout(function() {
        eraseWriter(title, message, 43);
    // }, 3000);
    Ecriture = setTimeout(function() {
        typeWriter(title, message2.slice(2, message2.length), 43);
    }, 1300);
    index++;
}, 5000);

// ================================================
// Diagramme ranked
// ================================================

function listNameExercices(elts) {
    names = [];
    for(let i = 0; i < elts.length; i++){
        names.push(elts[i]['exercice'] + ' - ' + elts[i]['language']);
    }
    return names;
}

function listNameNotions(elts){
    names = [];
    for(let i = 0; i < elts.length; i++){
        names.push(elts[i]['notion']);
    }
    return names;
}

function listNameLanguages(elts){
    names = [];
    for(let i = 0; i < elts.length; i++){
        names.push(elts[i]['language']);
    }
    return names;
}

function listVisit(elts){
    nb_visit = [];
    for(let i = 0; i < elts.length; i++){
        nb_visit.push(elts[i]['nb_visit']);
    }
    return nb_visit;
}

function listVisitMonth(elts){
    nb_visit = [];
    for(let i = 0; i < elts.length; i++){
        nb_visit.push(elts[i]['nb_visit_month']);
    }
    return nb_visit;
}

function Diagramme(elts, titre){
    const ctx = document.getElementById('bar-chart-' + titre).getContext('2d');

    var nb_visit = listVisit(elts);
    var nb_visit_month = listVisitMonth(elts);

    if(titre == "Exercices"){
        var names = listNameExercices(elts);
    }else if(titre == "Notions"){
        var names = listNameNotions(elts);
    }else if(titre == "Languages"){
        var names = listNameLanguages(elts);
    }

    const data = {
        labels: names,
        datasets: [
            {
                label: 'all time',
                data: nb_visit,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            },
            {
                label: 'monthly',
                data: nb_visit_month,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 2
            }
        ]
    };

    const barChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: titre,
                    font: {
                        size: 24
                    },
                    color: '#000',
                    position: 'top'
                },
                legend: {
                    labels: {
                        color: 'rgba(0, 0, 0, 1)' // Couleur du texte de la légende
                    },
                    onHover: function (event, legendItem, legend) {
                        document.getElementById('bar-chart-' + titre).style.cursor = 'pointer';
                      },
                    onLeave: function (event, legendItem, legend) {
                        document.getElementById('bar-chart-' + titre).style.cursor = 'default';
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'rgba(0, 0, 0, 1)' // Couleur des unités de l'axe Y
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.2)' // Couleur de la grille de l'axe Y
                    }
                },
                x: {
                    ticks: {
                        color: 'rgba(0, 0, 0, 1)' // Couleur des étiquettes de l'axe X
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.2)' // Couleur de la grille de l'axe X
                    }
                }
            }
        }
    });

    return barChart;
}

function CreateDiagrammeRanked() {
    var params = new URLSearchParams();

    fetch('fetch/liste_ranked_exercices.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            Diagramme(result, 'Exercices');
        })

    fetch('fetch/liste_ranked_notions.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            Diagramme(result, 'Notions');
        })

    fetch('fetch/liste_ranked_languages.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            Diagramme(result, 'Languages');
        })
}

document.addEventListener('DOMContentLoaded', function () {
    CreateDiagrammeRanked();
});

// ================================================
// Changer infos profil
// ================================================

let change_name = document.getElementById('change_name');
let change_firstname = document.getElementById('change_firstname');
let change_email = document.getElementById('change_email');
let change_mdp = document.getElementById('change_mdp');

let modif_name = document.getElementById('modif_name');
let modif_firstname = document.getElementById('modif_firstname');
let modif_email = document.getElementById('modif_email');
let modif_mdp = document.getElementById('modif_mdp');

function hidden_modif(){
    modif_name.style.display = 'none';
    modif_firstname.style.display = 'none';
    modif_email.style.display = 'none';
    modif_mdp.style.display = 'none';
}

hidden_modif();

change_name.addEventListener('click', function() {
    hidden_modif();
    modif_name.style.display = 'block';
});

change_firstname.addEventListener('click', function() {
    hidden_modif();
    modif_firstname.style.display = 'block';
});

change_email.addEventListener('click', function() {
    hidden_modif();
    modif_email.style.display = 'block';
});

change_mdp.addEventListener('click', function() {
    hidden_modif();
    modif_mdp.style.display = 'block';
});



// ================================================
// API ChatGPT
// ================================================

const API_KEY = "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";

