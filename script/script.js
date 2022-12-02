// ================================================
// ================== Variable ====================

var page_active = "0";

// ================================================
// ================== Initialisation de la page ===

window.onload = () => {
    document.querySelector("#Accueil").style.backgroundColor = "whitesmoke";
    document.querySelector("#page-accueil").style.display = "block";
    pages_types = document.querySelectorAll(".pages-types");
    for(var i = 0; i < pages_types.length; i++){
        pages_types[i].style.display = "none";
    }
};

// ================================================
// ================== Clique menu =================

let boutonsMenu = document.querySelectorAll("nav .bouton");
let Pages = document.getElementById("pages").childNodes;
console.log(Pages);

let pageAffichage = document.querySelector("#pages");

function resetAllMenu(elts) {
    for(var i = 0; i < elts.length; i++) {
        elts[i].style.backgroundColor = "grey";
    }
}

function resetAllPage(p){
    for(var i = 1; i < p.length; i += 2) {
        p[i].style.display = "none";
    }
}

for(var i = 0; i < boutonsMenu.length; i++){
    boutonsMenu[i].onclick = function(e){
        page_active = e.target.getAttribute("data-value");

        resetAllMenu(boutonsMenu);
        e.target.style.backgroundColor = "whitesmoke";
        
        resetAllPage(Pages);
        Pages[Number(page_active)*2+1].style.display = "block";

        
    }
}

// ================================================
// ================== Clique type exos ============

let boutonsTypesExos = document.querySelectorAll("nav .bouton_type_exo");

for(var i = 0; i < boutonsTypesExos.length; i++){
    boutonsTypesExos[i].onclick = function(e){
        console.log(e.target);
    }
}