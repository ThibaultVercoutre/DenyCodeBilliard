
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
        arbo.innerHTML += '<span class="lang arbo" data="' + e + '" onclick="languagesLanguageArbo()">Language : ' + e + '</span>';
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
            exercicesLang.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercicesLang.innerHTML += '<div class="exercice box" data-language="'+e1+'"><span>'+result[i]["name"]+'</span></div>'
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

console.log(BnotionsLang);

function FnotionsLang(notion){
    notion = document.querySelector('#languages .notion[data-notion="'+notion+'"]');
    BnotionsLang = document.querySelectorAll('#languages .notion');
    let exercicesLang = document.querySelector('#languages .exercises-container');
    console.log(exercicesLang.innerHTML);
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
    if(document.querySelector('#arbo_lang').childNodes.length == 2)
        document.querySelector('#arbo_lang').removeChild(document.querySelector('#arbo_lang').childNodes[1]);
    document.querySelectorAll('#languages .notions-container')[0].style.display = 'flex';
}

function languagesLanguageArbo(){
    languagesNotionArbo();
    BlanguagesLang.forEach((language) => {
        language.style.display = 'flex';
    });
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
    console.log("here");
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
        arbo.innerHTML += '<span class="not arbo" data="' + e + '" onclick="notionsNotionArbo()">Notion : ' + e + '</span>';
    }

    console.log(e);

    var params = new URLSearchParams();
    params.append('notion', e);

    fetch('fetch/liste_languages_notion.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            console.log(result);
            languagesNot.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                languagesNot.innerHTML += '<div class="language box" data-notion="'+e+'" data-language="'+result[i]["name"]+'" language='+e+' onclick="FlanguagesNot(\''+result[i]["name"]+'\')"><span>'+result[i]["name"]+'</span></div>'
            }
        })   
}

function createExercicesToLanguages(e1, e2) {
    var arbo = document.querySelector('#arbo_concept');
    if(arbo.childNodes.length == 1){
        arbo.innerHTML += '<span class="lang arbo" data="' + e2 + '" onclick="notionsLanguageArbo()">Language : ' + e2 + '</span>';
    }

    console.log(e1, e2);
    var params = new URLSearchParams();
    params.append('notion', e1);
    params.append('language', e2);

    fetch('fetch/liste_exercices_language.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            console.log(result);
            exercicesNot.innerHTML = '';
            for(let i = 0; i < result.length; i++){
                exercicesNot.innerHTML += '<div class="exercice box" data-notion="'+e1+'"><span>'+result[i]["name"]+'</span></div>'
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
    console.log(BlanguagesNot);
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
    if(document.querySelector('#arbo_concept').childNodes.length == 2)
        document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[1]);
    document.querySelectorAll('#concepts .languages-container')[0].style.display = 'flex';
}

function notionsNotionArbo(){
    notionsLanguageArbo()
    BnotionsNot.forEach((notion) => {
        notion.style.display = 'flex';
    });
    document.querySelector('#arbo_concept').removeChild(document.querySelector('#arbo_concept').childNodes[0]);
    languagesNot.innerHTML = '';
    document.querySelectorAll('#concepts .notions-container')[0].style.display = 'flex';
}