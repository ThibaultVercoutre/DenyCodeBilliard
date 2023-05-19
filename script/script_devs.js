document.addEventListener("DOMContentLoaded", function() {
  // Sélectionner les conteneurs d'images
  var imageContainers = document.querySelectorAll(".image-container");
  var citations = document.querySelectorAll(".citations");

  // Ajouter une classe pour démarrer l'animation
  setTimeout(function() {
      imageContainers.forEach(function(container) {
          container.classList.add("show");
      });
  }, 500); // Délai de 500 ms avant de démarrer l'animation
  setTimeout(function() {
    citations.forEach(function(citation) {
        citation.classList.add("showcit");
    });
  }, 4000); // Délai de 500 ms avant de démarrer l'animation
  setTimeout(function() {
    document.getElementById("thibault").classList.add("show-background");
  }, 6000);
  setTimeout(function() {
    document.getElementById("julien").classList.add("show-background");
  }, 6000);
});



const cimgthibault = document.getElementById('cimgthibault');
const thibault = document.getElementById("thibault");

cimgthibault.addEventListener('mouseover', function() {
  thibault.style.boxShadow = 'inset 0px 0px 200px rgb(45, 171, 213)';
  thibault.style.backgroundColor = 'rgba(0, 0, 0, 0.35)';
});
cimgthibault.addEventListener('mouseout', function() {
  thibault.style.boxShadow = 'inset 0px 0px 50px rgb(45, 171, 213)';
  thibault.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
});

const cimgjulien = document.getElementById('cimgjulien');
const julien = document.getElementById("julien");

cimgjulien.addEventListener('mouseover', function() {
  julien.style.boxShadow = 'inset 0px 0px 200px rgb(208, 13, 13)';
  julien.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
});
cimgjulien.addEventListener('mouseout', function() {
  julien.style.boxShadow = 'inset 0px 0px 50px rgb(208, 13, 13)';
  julien.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
});