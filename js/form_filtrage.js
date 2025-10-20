// const form_filtrage = document.querySelector('.form_filtrage');

// form_filtrage.addEventListener('submit',(e) => {
//     e.preventDefault();
// })

// const toggles = document.querySelectorAll('.faq-toggle');

// toggles.forEach(btn => {
//     btn.addEventListener('click', () => {
//         const content = btn.nextElementSibling;
//         const icon = btn.querySelector('svg');

//         document.querySelectorAll('.faq-content').forEach(c => {
//             if (c !== content) c.classList.add('hidden');
//         });
//         document.querySelectorAll('.faq-toggle svg').forEach(i => {
//             if (i !== icon) i.classList.remove('rotate-180');
//         });

//         content.classList.toggle('hidden');
//         icon.classList.toggle('rotate-180');
//     });
// });


const form_filtrage = document.querySelector('.form_filtrage');

form_filtrage.addEventListener('submit', (e) => {
  e.preventDefault();
});

const toggles = document.querySelectorAll('.faq-toggle');

// --- Ouvrir tous les contenus par défaut
document.querySelectorAll('.faq-content').forEach(c => c.classList.remove('hidden'));
document.querySelectorAll('.faq-toggle svg').forEach(i => i.classList.add('rotate-180'));

// --- Gérer les clics individuellement (sans fermer les autres)
toggles.forEach(btn => {
  btn.addEventListener('click', () => {
    const content = btn.nextElementSibling;
    const icon = btn.querySelector('svg');

    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  });
});
