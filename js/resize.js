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
