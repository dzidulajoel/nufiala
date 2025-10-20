const resizeBtn = document.querySelector('.resize');
const sidebar = document.querySelector('nav');
const textes = document.querySelectorAll('.lien');
const logo = document.querySelector('.logo');

let réduit = false;

resizeBtn.addEventListener('click', () => {
  réduit = !réduit;

  // Masquer ou afficher les textes
  textes.forEach(texte => texte.classList.toggle('hidden', réduit));

  // Gérer la largeur de la sidebar
  sidebar.classList.toggle('w-[12vw]', !réduit);
  sidebar.classList.toggle('w-[5vw]', réduit);

  // Gérer l'affichage du logo
  logo.classList.toggle('hidden', réduit);

  // Anime le fond interne si présent
  const inner = sidebar.querySelector('.transition-all');
  if (inner) {
    inner.classList.toggle('w-64', !réduit);
    inner.classList.toggle('w-16', réduit);
  }
});
  //----------------------------------------------------

const showBtn = document.getElementById('show');
const hideBtn = document.getElementById('hide');
const navbar = document.getElementById('navbar');

// Ouvrir
showBtn.addEventListener('click', (e) => {
  e.stopPropagation(); // empêche la propagation pour éviter une fermeture immédiate
  navbar.classList.remove('-translate-x-full');
  navbar.classList.add('translate-x-0');
});

// Fermer via le bouton
hideBtn.addEventListener('click', () => {
  navbar.classList.remove('translate-x-0');
  navbar.classList.add('-translate-x-full');
});

// Fermer en cliquant n’importe où ailleurs
document.addEventListener('click', (e) => {
  // Vérifie que le clic est à l’extérieur de la navbar et du bouton "show"
  if (!navbar.contains(e.target) && !showBtn.contains(e.target)) {
    navbar.classList.remove('translate-x-0');
    navbar.classList.add('-translate-x-full');
  }
});



