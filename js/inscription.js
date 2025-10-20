const inscription = document.querySelector('#inscription');
const creer_inscription = document.querySelector('#creer_inscription');
const loading = false;

inscription.addEventListener('submit', async (event) => {
    event.preventDefault();

    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('pwd').value;
    const conf_password = document.getElementById('confPwd').value;

    const data = {
        nom,
        prenom,
        email,
        password,
        conf_password,
    };


    let tousRemplis = true;
    for (let key in data) {
        if (!data[key] || data[key].trim() === "") {
            showAlert("Tous les champs doivent être remplis !", false);
            tousRemplis = false;
            break;
        }
    }

    if (tousRemplis) {
        if (!verifierMotDePasse(data.password)) {
            showAlert("Min. 8 caractères, majuscule, chiffre, symbole.", false);
        } else if (data.password !== data.conf_password) {
            showAlert("Les mots de passe ne sont pas identiques.", false);
        } else {
            const btn = document.getElementById('creer_inscription');
            btn.disabled = true;
            const originalText = btn.textContent;
            btn.textContent = 'Traitement en cours...';
            btn.classList.add('opacity-70', 'cursor-not-allowed');

            try {
                const response = await fetch('../scripts/inscription.php', {
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
                    showAlert(result.message , true);
                    inscription.reset();
                    
                    setTimeout(()=>{
                        window.location.href = '../connexion';
                    }, 2000)
                    
                } else {
                    showAlert(result.message, false);
                }
            }
            catch (err) {
                showAlert("Une erreur est survenue. Veuillez réessayer", false);
            }
            finally {
                btn.disabled = false;
                btn.textContent = originalText;
                btn.classList.remove('opacity-70', 'cursor-not-allowed');
            }
        }
    }

});


function verifierMotDePasse(password) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}


const showAlert = (message, isSuccess = true) => {
    // Supprime tout ancien message avant d’en afficher un nouveau
    const existing = document.querySelector('#msg_inscription');
    if (existing) existing.remove();

    // Crée le conteneur principal
    const alert = document.createElement('div');
    alert.id = 'msg_inscription';
    alert.className = `absolute top-[2%] left-1/2 -translate-x-1/2 ${isSuccess ? 'bg-green-500' : 'bg-red-500'} text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-auto opacity-0 transition-opacity duration-500`;

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


