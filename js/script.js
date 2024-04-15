console.log("Démarrage du script !");

// Différer le lancement du script => ne se lance qu'une fois que tout le HTML a été chargé

document.addEventListener("DOMContentLoaded", function () {
  monScript();
});
function monScript() {
let posX = 0;
let mouveCloud = false;

const root = document.documentElement;
const place = document.querySelector("#place");

const handleIntersect = (entries) => {
  entries.forEach(function (entry) {
    // Contrôle si l'élément à observer
    // est dans le ratio de la zone qui est affichée
    if (entry.intersectionRatio > ratio) {
      elementName = entry.target.className;
      // console.log(elementName + " est visible");

      // Si on trouve l'élément indiqué, on active l'animation d'apparition
      if (
        elementName === "story hidden" ||
        elementName === "studio hidden" ||
        elementName === "section-oscars hidden" ||
        elementName === "site-footer hidden"
      ) {
        // On valide la class qui va executer le keyframes d'apparition des sections
        entry.target.classList.add("mouve-up");
        // On arrête l'observation sur cet élément
        observer.unobserve(entry.target);
        // On retire la class qui cachait par défaut l'élement
        entry.target.classList.remove("hidden");
      }

      if (
        elementName === "story__title hidden" ||
        elementName === "studio__title hidden" ||
        elementName === "characters__title hidden" ||
        elementName === "place__title hidden"
      ) {
        entry.target.classList.add("animTitle");
        observer.unobserve(entry.target);
        entry.target.classList.remove("hidden");
      }
    }
  });
};

  const ratio = 0.05;
  const options = {
    root: null,
    rootMargin: "0px",
    threshold: ratio,
  };

  // https://developer.mozilla.org/fr/docs/Web/API/Intersection_Observer_API
  // https://grafikart.fr/tutoriels/scroll-reveal-1176#autoplay
  //  Initialisation de la fonction IntersectionObserver
  const observer = new IntersectionObserver(handleIntersect, options);

  // Activation des éléments que l'on va surveiller
  observer.observe(document.querySelector(".story"));
  observer.observe(document.querySelector(".studio"));
  observer.observe(document.querySelector(".section-oscars"));
  observer.observe(document.querySelector(".site-footer"));
  observer.observe(document.querySelector(".story__title"));
  observer.observe(document.querySelector(".studio__title"));
  observer.observe(document.querySelector(".characters__title"));
  observer.observe(document.querySelector(".place__title"));
  

  // Contrôle si on scroll sur la fenêtre
  window.addEventListener("scroll", () => {
    // Si on scroll, cela accélère la rotation des fleurs
    // https://www.toutjavascript.com/reference/ref-window.scrolly.php
    var vertical = -1;
    setInterval(function () {
      if (window.scrollY != vertical) {
        vertical = window.scrollY;
        root.style.setProperty("--rotate", "3s");
      } else {
        root.style.setProperty("--rotate", "15s");
      }
    }, 500);


    // On bouge les nuages en fonction du scroll
      posX = Math.round(0 - (window.scrollY - place.offsetTop - 200));
      if (posX <= 0 && posX > -400) {
        root.style.setProperty("--posX", posX + "px");
      }     
  });
}


