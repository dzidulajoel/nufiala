document.addEventListener('DOMContentLoaded', () => {
        const links = document.querySelectorAll('#menu a');
        const sections = document.querySelectorAll('.section');

        // Fonction pour afficher une section et cacher les autres
        function showSection(id) {
                // Cacher toutes les sections
                sections.forEach(sec => {
                        sec.classList.add('hidden');
                });

                // Afficher la section active
                const activeSection = document.getElementById(id);
                if (activeSection) {
                        activeSection.classList.remove('hidden');
                }

                // Réinitialiser les styles des liens
                links.forEach(link => {
                        link.classList.remove('bg-[#3396D3]', 'text-white');
                });

                // Activer le lien correspondant
                const activeLink = document.querySelector(`#menu a[data-section="${id}"]`);
                if (activeLink) {
                        activeLink.classList.add('bg-[#3396D3]', 'text-white', 'py-1', 'rounded-lg');
                }

                // Sauvegarder dans localStorage
                localStorage.setItem('activeSection', id);
        }

        // Restaurer section active depuis localStorage
        const savedSection = localStorage.getItem('activeSection') || 'section1';
        showSection(savedSection);

        // Ajouter l'événement click sur les liens
        links.forEach(link => {
                link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const sectionId = link.dataset.section;
                        showSection(sectionId);
                });
        });
});
