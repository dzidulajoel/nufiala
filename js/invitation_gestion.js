// Gestion dynamique des invitations (acceptation / refus)
document.addEventListener('click', async (e) => {
    const btnAccept = e.target.closest('.btn_accepter');
    const btnRefuse = e.target.closest('.btn_refuser');

    const btn = btnAccept || btnRefuse;
    if (!btn) return; // pas un bouton concerné

    e.preventDefault();

    const isAccept = !!btnAccept;
    const action = isAccept ? 'accepter' : 'refuser';
    const id = btn.dataset[action];
    const card = btn.closest('.invitation_card');

    if (!id || !card) {
        console.error("Impossible de trouver l'ID ou le conteneur de la carte.");
        return;
    }

    const url = isAccept
        ? '../scripts/invitation_gestion_accepter.php'
        : '../scripts/invitation_gestion_refuser.php';

    try {
        btn.disabled = true;
        btn.classList.add('opacity-60', 'cursor-not-allowed');

        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ [action]: id })
        });

        if (!response.ok) throw new Error(`Erreur réseau : ${response.status}`);

        const result = await response.json();
        console.log('Réponse serveur:', result);

        if (result.success) {
            if(isAccept){
                showAlert_invitation("Invitation acceptée.",true);
            }
            else{
                showAlert_invitation( "Invitation refusée.",false);
            }

            // Animation de disparition
            card.classList.add('opacity-0', 'scale-95', 'transition', 'duration-300');

            setTimeout(() => card.remove(), 300);
        } else {
            showAlert_invitation(result.message || "Échec de l’action.", false);
            btn.disabled = false;
            btn.classList.remove('opacity-60', 'cursor-not-allowed');
        }
    } catch (error) {
        console.error(error);
        showAlert_invitation("Une erreur est survenue. Veuillez réessayer.", false);
        btn.disabled = false;
        btn.classList.remove('opacity-60', 'cursor-not-allowed');
    }
});



const showAlert_invitation = (message, isSuccess = true) => {
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
    }, isSuccess ? 1000 : 1000);
};
