const Modifier_le_profil_btn = document.querySelector('#Modifier_le_profil_btn');
const sauvegarder_les_modifications = document.querySelector('#sauvegarder_les_modifications');
const form_parametre = document.querySelector('#form_parametre');

const inputs = [
    '#nom',
    '#prenom',
    '#nom_utilisateur',
    '#email',
    '#tel',
    '#genre',
    '#date_de_naissance',
    '#localisation',
    '#description_profil',
    '#domaine_principal',
    '#niveau',
    '#disponibilite',
    '#mode_d_echange',
    '#competences_principales'
].map(selector => document.querySelector(selector));


inputs.forEach(input => input.disabled = true);


Modifier_le_profil_btn.addEventListener('click', () => {
    inputs.forEach(input => input.disabled = false);
});

form_parametre.addEventListener('submit', (e) => {
    e.preventDefault();
})

sauvegarder_les_modifications.addEventListener('click', async () => {
    const data = {};

    inputs.forEach(input => {
        data[input.id] = input.value.trim();
        input.disabled = true;
    });

    try {
        const response = await fetch('../scripts/parametre.php', {
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
            showAlert(result.message, true);
            inputs.forEach(input => input.disabled = true);

        } else {
            showAlert(result.message, false);
        }
    }
    catch (err) {
        showAlert("Une erreur est survenue. Veuillez réessayer", false);
    }

});


// SUPPRESSION
document.addEventListener('DOMContentLoaded', function () {
    const btnOuvrir = document.getElementById('supprimer_le_compte');
    const modal = document.getElementById('suppression-box');
    const btnFermer = document.getElementById('close-suppression');
    const btnAnnuler = document.getElementById('annuler-suppression');
    const btnValider = document.getElementById('valider-suppression');

    // Ouvrir la modal
    btnOuvrir.addEventListener('click', (e) => {
        e.stopPropagation();
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    });

    // Fermer la modal
    const fermerModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    };

    btnFermer.addEventListener('click', fermerModal);
    btnAnnuler.addEventListener('click', fermerModal);

    // Fermer en cliquant en dehors du contenu
    modal.addEventListener('click', (e) => {
        if (e.target === modal) fermerModal();
    });

    // Fermer avec Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) fermerModal();
    });

    // SUPPRESSION compte
    btnValider.addEventListener('click', async () => {
        const utilisateurId = btnOuvrir.getAttribute('data-id_utilisateur');

        const data = { utilisateurId }

        try {
            const response = await fetch('../scripts/suppression_du_compte.php', {
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
                showAlert('Suppression en cours', false);
                setTimeout(() => {
                    showAlert(result.message, true);

                }, 4000)
                setTimeout(() => {
                    window.location.href = "../connexion"

                }, 6000)

            } else {
                showAlert(result.message, false);
            }
        }
        catch (err) {
            showAlert("Une erreur est survenue. Veuillez réessayer", false);
        }
        fermerModal();
    });
});

// DECONNEXION
document.querySelectorAll(".deconnexion").forEach((btn) => {
    btn.addEventListener("click", function () {
        fetch("../config/logout.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" }
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, true);
                    setTimeout(() => {
                        window.location.href = "../connexion";

                    }, 3000);
                } else {
                    showAlert("Erreur : " + data.message, false);
                }
            })
            .catch(err => {
                console.error(err);
                showAlert("Erreur serveur : " + err.message, false);
            });
    });
});


// ALERTE DE MESSAGE
const showAlert = (message, isSuccess = true) => {
    // Supprime tout ancien message avant d’en afficher un nouveau
    const existing = document.querySelector('#msg_parametre');
    if (existing) existing.remove();

    // Crée le conteneur principal
    const alert = document.createElement('div');
    alert.id = 'msg_inscription';
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

