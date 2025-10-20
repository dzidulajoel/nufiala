document.addEventListener('DOMContentLoaded', function () {
    const notifBtn = document.getElementById('notif-btn');
    const notifBox = document.getElementById('notif-box');
    const closeNotif = document.getElementById('close-notif');

    if (!notifBtn || !notifBox || !closeNotif) {
        console.warn('Element manquant: vérifie les id notif-btn, notif-box, close-notif');
        return;
    }

    // Ouvre / ferme (toggle)
    notifBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        notifBox.classList.toggle('hidden');
        notifBox.classList.toggle('flex');
        // empêcher le scroll du body quand modal ouverte
        document.body.style.overflow = notifBox.classList.contains('flex') ? 'hidden' : '';
    });

    // Bouton fermer
    closeNotif.addEventListener('click', () => {
        notifBox.classList.add('hidden');
        notifBox.classList.remove('flex');
        document.body.style.overflow = '';
    });

    // Fermer en cliquant en dehors du contenu
    notifBox.addEventListener('click', (e) => {
        // si clic sur le backdrop (notifBox lui-même), fermer
        if (e.target === notifBox) {
            notifBox.classList.add('hidden');
            notifBox.classList.remove('flex');
            document.body.style.overflow = '';
        }
    });

    // Fermer avec Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !notifBox.classList.contains('hidden')) {
            notifBox.classList.add('hidden');
            notifBox.classList.remove('flex');
            document.body.style.overflow = '';
        }
    });
});



const proposerBtn = document.getElementById('Proposer');
const chercherBtn = document.getElementById('Chercher');

const proposerDiv = document.getElementById('proposer_une_competence');
const chercherDiv = document.getElementById('chercher_une_competence');

const hideProposer = document.getElementById('hide_proposer');
const hideChercher = document.getElementById('hide_chercher');

// Afficher la section "Proposer une compétence"
proposerBtn.addEventListener('click', () => {
  proposerDiv.classList.remove('hidden');
  chercherDiv.classList.add('hidden');
});

// Afficher la section "Chercher une compétence"
chercherBtn.addEventListener('click', () => {
  chercherDiv.classList.remove('hidden');
  proposerDiv.classList.add('hidden');
});

// Cacher les deux sections avec les boutons de fermeture
hideProposer.addEventListener('click', () => {
  proposerDiv.classList.add('hidden');
});

hideChercher.addEventListener('click', () => {
  chercherDiv.classList.add('hidden');
});

// Fermer si clic en dehors
document.addEventListener('click', (e) => {
  if (!proposerDiv.contains(e.target) && e.target !== proposerBtn) {
    proposerDiv.classList.add('hidden');
  }
  if (!chercherDiv.contains(e.target) && e.target !== chercherBtn) {
    chercherDiv.classList.add('hidden');
  }
});


// const modifierBtn = document.getElementById('modifier_proil');
// const parametreSection = document.querySelector('.parametre');

// // Afficher la section quand on clique sur "Modifier"
// modifierBtn.addEventListener('click', () => {
//   parametreSection.classList.remove('hidden');
// });

// // Fermer si clic en dehors
// document.addEventListener('click', (e) => {
//   if (!parametreSection.contains(e.target) && e.target !== modifierBtn) {
//     parametreSection.classList.add('hidden');
//   }
// });
