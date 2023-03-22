
// Nav bar

const navLinks = document.querySelectorAll('.nav-link');
const contentSections = document.querySelectorAll('.content-section');

function cacheSections(){
    contentSections.forEach((section) => {
        section.style.display = 'none';
    });
}

cacheSections();

navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        cacheSections();
        document.getElementById(e.target.getAttribute('data-target')).style.display = 'block';
    });
});

// ================================================
// afficher Languages -> Notions -> Exercices
// ================================================

let notions = document.querySelector('#languages .notions-container');
let exercices = document.querySelector('#languages .exercises-container');

function affLanguagesToLanguages(e, sec){
    if(sec == 'languages'){
        Blangages.forEach((langage) => {
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
        Bnotions.forEach((notion) => {
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
        arbo.innerHTML += '<span class="lang arbo" data="' + e + '" onclick="languagesLanguageArbo()">Language : ' + e + '</span>';
    }

    var params = new URLSearchParams();
    params.append('language', e);

    fetch('fetch/liste_notions_language.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            notions.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                notions.innerHTML += '<div class="notion box" data-language="'+e+'" language='+e+'><span>'+result[i]["name"]+'</span></div>'
            }
            notions.click();
        })   
}

function createExercicesToNotions(e1, e2) {
    var arbo = document.querySelector('#arbo_lang');
    if(arbo.childNodes.length == 1){
        arbo.innerHTML += '<span class="not arbo" data="' + e2 + '" onclick="languagesNotionArbo()">Notion : ' + e2 + '</span>';
    }
    var params = new URLSearchParams();
    params.append('language', e1);
    params.append('notion', e2);

    fetch('fetch/liste_exercices_notion.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            exercices.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercices.innerHTML += '<div class="exercice box" data-language="'+e1+'"><span>'+result[i]["name"]+'</span></div>'
            }
            exercices.click();
        })
        
}

const Blangages = document.querySelectorAll('#languages .language');
var Bnotions = document.querySelectorAll('#languages .notion');
var Bexercices = document.querySelectorAll('#languages .exercice');

Blangages.forEach((langage) => {
    langage.addEventListener('click', () => {
        affLanguagesToLanguages(0, 'languages');
        langage.style.display = 'flex';
        createNotionsToLanguages(langage.getAttribute('data-language'));
        languagesNotionArbo();
    });
});

notions.addEventListener('click', () => {
    Bnotions = document.querySelectorAll('#languages .notion');
    Bnotions.forEach((notion) => {
        notion.addEventListener('click', () => {
            let exercices = document.querySelector('#languages .exercises-container');
            if(exercices.innerHTML == ''){
                affNotionsToLanguages(0, 'languages');
                notion.style.display = 'flex';
                createExercicesToNotions(notion.getAttribute('data-language'), notion.firstChild.textContent);
            }
        });
    });
});

function languagesExerciceArbo(){
    exercices.innerHTML = '';
}

function languagesNotionArbo(){
    languagesExerciceArbo();
    Bnotions.forEach((notion) => {
        notion.style.display = 'flex';
    });
    if(document.querySelector('#arbo_lang').childNodes.length == 2)
        document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[1]);
    exercices.innerHTML = '';
}

function languagesLanguageArbo(){
    languagesNotionArbo();
    Blangages.forEach((language) => {
        language.style.display = 'flex';
    });
    document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[0]);
    notions.innerHTML = '';
}

// ================================================
// afficher Notions -> Languages -> Exercices
// ================================================

let languages = document.querySelector('#concepts .notions-container');
let exercices2 = document.querySelector('#concepts .exercises-container');

// Cache les sections
function cacheConceptsSections(){
    contentSections.forEach((section) => {
        section.style.display = 'none';
    });
}

// Affiche les langages en fonction des notions
function affLanguagesToConcepts(e, sec) {
    if(sec == 'concepts'){
        Blanguages2.forEach((language) => {
            if(e == 0){
                language.style.display = 'none';
            }else{
                language.style.display = 'flex';
            }
        });
    }
}

// Affiche les notions en fonction des langages
function affNotionsToConcepts(e, sec) {
    if(sec == 'concepts'){
        Bnotions2.forEach((notion) => {
            if(e == 0){
                notion.style.display = 'none';
            }else{
                notion.style.display = 'flex';
            }
        });
    }
}

// Crée les langages pour chaque notion
function createLanguagesToConcepts(e) {
    var arbo = document.querySelector('#arbo_concept');
    if(arbo.childNodes.length == 0){
        arbo.innerHTML += '<span class="not arbo" data="' + e + '" onclick="conceptsNotionArbo()">Notion : ' + e + '</span>';
    }

    var params = new URLSearchParams();
    params.append('notion', e);

    fetch('fetch/liste_languages_notion.php', {
        method: 'POST',
        body: params
    }).then(response => response.json())
        .then(result => {
            languages.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                languages.innerHTML += '<div class="language box" data-notion="'+e+'" notion='+e+'><span>'+result[i]["name"]+'</span></div>'
            }
            languages.click();
        })
}

// Crée les exercices pour chaque langage et notion
function createExercisesToConcepts(e1, e2) {
    var arbo = document.querySelector('#arbo_concept');
    if(arbo.childNodes.length == 1){
        arbo.innerHTML += '<span class="lang arbo" data="' + e2 + '" onclick="conceptsLanguageArbo()">Language : ' + e2 + '</span>';
    }
    var params = new URLSearchParams();
    params.append('notion', e1);
    params.append('language', e2);

    fetch('fetch/liste_exercices_notion_language.php', {
        method: 'POST',
        body: params
    }).then(response => response.json())
        .then(result => {
            exercices.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercices.innerHTML += '<div class="exercice box" data-notion="'+e1+'"><span>'+result[i]["name"]+'</span></div>'
            }
            exercices.click();
        })
}

var Blanguages2 = document.querySelectorAll('#concepts .language');
const Bnotions2 = document.querySelectorAll('#concepts .notion');
var Bexercices2 = document.querySelectorAll('#concepts .exercice');


Bnotions2.forEach((notion) => {
    notion.addEventListener('click', () => {
        affNotionsToConcepts(0, 'concepts');
        notion.style.display = 'flex';
        createLanguagesToConcepts(notion.getAttribute('data-notion'));
        conceptsLanguageArbo();
    });
});

languages.addEventListener('click', () => {
    Blanguages2 = document.querySelectorAll('#concepts .language');
    Blanguages2.forEach((language) => {
        language.addEventListener('click', () => {
            let exercices = document.querySelector('#concepts .exercises-container');
            if(exercices.innerHTML == ''){
                affLanguagesToConcepts(0, 'concepts');
                language.style.display = 'flex';
                createExercisesToConcepts(language.getAttribute('data-notion'), language.firstChild.textContent);
            }
        });
    });
});

function conceptsExerciceArbo() {
    exercices.innerHTML = '';
}

function conceptsLanguageArbo() {
    conceptsExerciceArbo();
    Blanguages2.forEach((language) => {
        language.style.display = 'flex';
    });
    if(document.querySelector('#arbo_concept').childNodes.length == 2)
        document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[1]);
    exercices.innerHTML = '';
}

function conceptsNotionArbo() {
    conceptsLanguageArbo();
    Bnotions2.forEach((notion) => {
        notion.style.display = 'flex';
    });
    document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[0]);
    languages.innerHTML = '';
}

