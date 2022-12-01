// ================================================
// ================== Clique menu =================

let boutonsMenu = document.querySelectorAll("nav .bouton");
let pageAffichage = document.querySelector("#pages");

console.log(pageAffichage.getAttribute("data-value"));

function resetAllMenu(elts) {
    for(var i = 0; i < elts.length; i++) {
        elts[i].style.backgroundColor = "transparent";
    }
}

for(var i = 0; i < boutonsMenu.length; i++){
    boutonsMenu[i].onclick = function(e){
        resetAllMenu(boutonsMenu);
        e.target.style.backgroundColor = "whitesmoke";
    }
}