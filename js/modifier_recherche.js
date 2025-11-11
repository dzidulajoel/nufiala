const chercher_form = document.querySelector("#chercher_form");
const chercher_une_competence = document.querySelector("#chercher_une_competence");
const btn_recherche = document.querySelector('#btn_recherche')
const text_initial = btn_recherche.textContent;
if (chercher_form) {

    const inputs_pro = [
        '#titre_Competence_recherche',
        '#categorie_recherche',
        '#niveau_recherche',
        '#description_recherche',
        '#Disponibilite_recherche',
        '#Mode_d_echange_recherche',
        '#Lieu_recherche',
    ].map(selector => {
        const el = document.querySelector(selector);
        if (!el) console.warn(`Élément introuvable : ${selector}`);
        return el;
    }).filter(Boolean);

    chercher_form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = btn_recherche.dataset.post_id;
        const data = {id};

        inputs_pro.forEach(input => {
            if (input.type === 'file') {
                data[input.id] = input.files[0] ? input.files[0].name : null;
            } else {
                data[input.id] = input.value.trim();
            }
        });

        btn_recherche.textContent = 'Modification en cours ...'
        
        try {

            const response = await fetch('../../scripts/modifier_recherche.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);
            }
            const result = await response.json();
            if (result.success) {
                
                setTimeout(() => {
                    showAlert_pro(result.message, true);
                    btn_recherche.textContent = text_initial;
                }, 2000)


            } else {
               showAlert_pro(result.message, false);
            }
        }
        catch (err) {
            showAlert_pro("Une erreur est survenue. Veuillez réessayer", false);
        }

    });

} else {
    console.error("Formulaire introuvable : #chercher_form");
}


// ALERTE DE MESSAGE
const showAlert_pro = (message, isSuccess = true) => {
    // Supprime tout ancien message avant d’en afficher un nouveau
    const existing = document.querySelector('#msg_proposition');
    if (existing) existing.remove();

    // Crée le conteneur principal
    const alert = document.createElement('div');
    alert.id = 'msg_proposition';
    alert.className = `z-1000 absolute top-[4%] left-1/2 -translate-x-1/2 ${isSuccess ? 'bg-green-500' : 'bg-red-500'} text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-auto opacity-0 transition-opacity duration-500`;

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

