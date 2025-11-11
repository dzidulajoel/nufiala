document.querySelectorAll('.follow_btn').forEach(btn => {
    btn.addEventListener('click', async () => {
        const follow = btn.dataset.follow;
        const sameButtons = document.querySelectorAll(`[data-follow="${follow}"]`);

        try {
            const response = await fetch('../scripts/follow.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ follow })
            });

            if (!response.ok) throw new Error(`Erreur réseau : ${response.status} ${response.statusText}`);

            const result = await response.json();
            // Appliquer les changements à tous les boutons identiques
            const isFollowing = btn.classList.toggle('following');

            if (result.success) {
                if(result.followed){
                    sameButtons.forEach(button => {

                            button.classList.add('animate-like');
                            button.classList.remove('bg-[#3B82F6]');
                            button.classList.add('bg-green-500');
    
                            setTimeout(() => {
                                button.innerHTML = `
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <path fill="#fff" fill-rule="evenodd" d="m6 10l-2 2l6 6L20 8l-2-2l-8 8z"/>
                                    </svg>`;
                                button.classList.remove('animate-like');
                            }, 300);
    
                    });
                    
                    showAlert(result.message, true);
                }
                else{
                    sameButtons.forEach(button => {
                    button.classList.add('animate-like');
                    button.classList.add('bg-[#3B82F6]');
                    button.classList.remove('bg-green-500');

                    setTimeout(() => {
                        button.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M12 19V5m7 7H5"/>
                            </svg>`;
                        button.classList.remove('animate-like');
                    }, 300);
    
                    });
                    showAlert(result.message, false);
                }
            }
            else {
               showAlert(result.message, false);
            }
        }
        catch (err) {
            showAlertLike("Une erreur est survenue. Veuillez réessayer", false);
        }
    });
});


const showAlertabonner = (message, isSuccess = true) => {
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
