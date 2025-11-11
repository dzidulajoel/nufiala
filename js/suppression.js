document.querySelectorAll('.suppression_post').forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.suppression_post;
        const card = btn.closest('.carte_proposition'); // le conteneur principal de la carte

        try {
            const response = await fetch('../scripts/suppression.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id })
            });

            if (!response.ok) {
                throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);
            }

            const result = await response.json();

            if (result.success) {
                showAlertDelete("Suppression en cours ...", true);

                // Petite attente visuelle avant la disparition
                setTimeout(() => {
                    showAlertDelete(result.message, true);

                    // 🧹 Suppression visuelle de la carte
                    if (card) {
                        card.classList.add('opacity-0', 'scale-95', 'transition', 'duration-300');
                        setTimeout(() => card.remove(), 1000); // supprime après animation
                    }

                    // Met à jour le compteur
                    const compteur = document.querySelector('.nombre_propositions');
                    if (compteur && result.count !== undefined) {
                        compteur.textContent = result.count;
                    }
                }, 1500);
            } else {
                showAlertDelete(result.message, false);
            }
        } catch (err) {
            showAlertDelete("Une erreur est survenue. Veuillez réessayer", false);
        }
    });
});




const showAlertDelete = (message, isSuccess = true) => {
    // Supprime tout ancien message avant d’en afficher un nouveau
    const existing = document.querySelector('#msg_delete');
    if (existing) existing.remove();

    // Crée le conteneur principal
    const alert = document.createElement('div');
    alert.id = 'msg_delete';
    alert.className = `absolute top-[4%] left-1/2 -translate-x-1/2 ${isSuccess ? 'bg-green-500' : 'bg-red-500'} text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-auto opacity-0 transition-opacity duration-500`;

    // Ajoute l’icône SVG
    const icon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    icon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
    icon.setAttribute('width', '1.3em');
    icon.setAttribute('height', '1.3em');
    icon.setAttribute('viewBox', '0 0 24 24');
    icon.setAttribute('fill', 'none');

    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    path.setAttribute('d', isSuccess ? 'M9 12.5L11 14.5L15 10.5' : 'M15 9L9 15');
    path.setAttribute('stroke', 'white');
    path.setAttribute('stroke-width', '2');
    path.setAttribute('stroke-linecap', 'round');
    path.setAttribute('stroke-linejoin', 'round');

    const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
    circle.setAttribute('cx', '12');
    circle.setAttribute('cy', '12');
    circle.setAttribute('r', '9');
    circle.setAttribute('stroke', 'white');
    circle.setAttribute('stroke-width', '2');

    icon.appendChild(path);
    icon.appendChild(circle);
    alert.appendChild(icon);

    // Texte du message
    const text = document.createElement('p');
    text.className = 'text-sm font-medium paragraphe';
    text.textContent = message;
    alert.appendChild(text);

    // Ajoute au body
    document.body.appendChild(alert);

    // Animation apparition
    requestAnimationFrame(() => {
        alert.classList.remove('opacity-0');
        alert.classList.add('opacity-100');
    });

    // Disparition auto
    setTimeout(() => {
        alert.classList.remove('opacity-100');
        alert.classList.add('opacity-0');
        setTimeout(() => alert.remove(), 500);
    }, isSuccess ? 3000 : 4000);
};
