const modal = document.getElementById('modalPoints');
const btnOpen = document.getElementById('envoie_de_point');
const btnClose = document.getElementById('closeModal');
const btnSend = document.querySelectorAll('.btnSend_point');
const alertBox = document.getElementById('alertModal');
const affichage_point = document.querySelector('.affichage_point');
const pointDepense = document.querySelector('.pointDepense');
const pointGagne = document.querySelector('.pointGagne')
const pointAccueil = document.querySelector('.pointAccueil');


btnOpen.addEventListener('click', () => modal.classList.remove('hidden'));
btnClose.addEventListener('click', () => modal.classList.add('hidden'));
// Fermer si clic en dehors de la modal
modal.addEventListener('click', e => {
    if (e.target === modal) modal.classList.add('hidden');
});


let valeurDepense = parseInt(pointDepense.textContent.trim(), 10);

btnSend.forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.point
        const [idReceveur, idEnvoyeur, idInvitation, idPost, point, invitation_type] = id.split("_");


        try {
            const response = await fetch('../scripts/point.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({  idEnvoyeur,idReceveur, idInvitation, idPost, point, invitation_type })
            });

            if (!response.ok) {
                throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);
            }
            const result = await response.json();
        
            btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <path fill="#fff" d="M12,23a9.63,9.63,0,0,1-8-9.5,9.51,9.51,0,0,1,6.79-9.1A1.66,1.66,0,0,0,12,2.81h0a1.67,1.67,0,0,0-1.94-1.64A11,11,0,0,0,12,23Z">
                        <animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/>
                    </path>
                </svg>
            `;
            if (result.success) {
                showAlertPoint(result.message, true);
                setTimeout(() => {
                    affichage_point.textContent = '.';
                    pointDepense.textContent = '.'
                    pointAccueil.textContent = '.'
                }, 700)
                setTimeout(() => {
                    affichage_point.textContent = '..';
                    pointDepense.textContent = '..'
                    pointAccueil.textContent = '..'
                }, 1000)
                setTimeout(() => {
                    affichage_point.textContent = '...';
                    pointDepense.textContent = '...'
                    pointAccueil.textContent = '...'
                }, 1500)
                setTimeout(() => {


                    const points = result.point || 0; 
                    pointAccueil.textContent = points + " pt" + (points !== 1 ? "s" : "");

                    affichage_point.textContent = points;
                    const pointsNum = parseInt(point, 10);
                    valeurDepense += pointsNum;
                   pointDepense.textContent = valeurDepense;
                    btn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="#fff" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    `;
                    btn.classList.add('bg-green-600')
                }, 2000)
                

            } else {
                showAlertPoint(result.message, false);
            }
        }
        catch (err) {
            showAlertPoint(result.message, false);
        }


    })
});

const showAlertPoint = (message, isSuccess = true) => {
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
