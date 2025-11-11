document.querySelectorAll('.likeBtn').forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.like;

    
        try {
            const response = await fetch('../scripts/like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id})
            });

            if (!response.ok) {
                throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);
            }
            const result = await response.json();
            if (result.success) {
                
                if(result.liked){
                    btn.classList.add('animate-like');
                    setTimeout(() => {
                        btn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                        <path fill="red" d="M20.205 4.791a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416"/>
                        </svg>
                        `;
                        btn.classList.remove('animate-like');
                    }, 300);
                    
                }
                else{
                    
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595m6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584c.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a1 1 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002"/></svg>`
                }
                console.log(result.id);
                

            } else {
                // showAlert(result.message, false);
            }
        }
        catch (err) {
            // showAlertLike("Une erreur est survenue. Veuillez réessayer", false);
        }
    });
});





const showAlertLike = (message, isSuccess = true) => {
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
