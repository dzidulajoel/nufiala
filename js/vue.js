const btnVuesPostes = document.querySelectorAll('.btnVuesPostes');
const modalsvoirplus = document.getElementById('modalsvoirplus');
const btnCloseVue = document.getElementById('closeModalVue');

// Fonction pour ouvrir la modal
function openModal() {
    modalsvoirplus.classList.remove('hidden');
}

// Fonction pour fermer la modal
function closeModal() {
    modalsvoirplus.classList.add('hidden');
}

// Ajouter l'événement click pour chaque boutton
btnVuesPostes.forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();

        // Ouvre la modal
        openModal();

        // Récupérer l'ID de la vue
        const vueId = btn.getAttribute('data-vue');

        try {
            const response = await fetch('../scripts/vue.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ vueId })
            });

            if (!response.ok) {
                throw new Error(`Erreur réseau : ${response.status} ${response.statusText}`);
            }

            const result = await response.json();

            if (result.success) {
                const data = result.data;
                const detailsContainer = document.querySelector('.detailsContainer');

                const colorHash = (str) => '#' + md5(str).substring(0, 6);

                const simpleColor = (str) => {
                    let hash = 0;
                    for (let i = 0; i < str.length; i++) hash = str.charCodeAt(i) + ((hash << 5) - hash);
                    return '#' + ((hash >> 24) & 0xFFFFFF).toString(16).padStart(6, '0');
                };

                //const color = simpleColor(data.nom ?? '');
                const initiales = (data.nom?.[0] ?? '') + (data.prenom?.[0] ?? '');
                const color = '#'+Math.floor(Math.random()*16777215).toString(16);

                console.log(color);
                
                detailsContainer.innerHTML = `
                    <div class="w-full h-full px-6 rounded-lg overflow-y-auto flex flex-col gap-2 bg-white">
                        <!-- En-tête post et utilisateur -->
                        <div class="flex items-center gap-2">
                            <div class="w-24 h-24 rounded-xl bg-black flex justify-center items-center text-white text-3xl font-bold">
                                <span style="color:${color};">${initiales.toUpperCase() || 'N/A'}</span>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 titre">
                                    ${data.nom ?? ''} ${data.prenom ?? ''} • Membre depuis ${data.membre_depuis ?? ''}
                                </h2>
                                <p class="text-sm text-gray-500 paragraphe">${data.pseudo ?? ''}</p>
                                <div class="flex justify-start items-center gap-2">
                                    <div class="paragraphe py-1 rounded-lg flex justify-center items-center">
                                        <span>${data.note_moyenne ?? ''}</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                                <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center gap-1">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                                            </svg>
                                        </span>
                                        <span>${data.points ?? ''} pt${(data.points ?? 0) > 1 ? 's' : ''}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations du post -->
                        <div class="p-4 flex flex-col gap-3">
                            <h3 class="text-lg font-semibold text-gray-800 titre">${data.Titre_de_la_competence ?? ''}</h3>
                            <p class="text-gray-500 text-md paragraphe">${data.categorie_proposition ?? ''} - ${data.niveau_propose ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe">${data.description_proposition ?? ''}</p>
                            <div class="flex gap-4 text-gray-600 text-md mt-2 paragraphe">
                                <span><strong class="titre">Disponibilité :</strong> ${data.Disponibilite_proposition ?? ''}</span>
                                <span><strong class="titre">Mode :</strong> 
                                    ${data.Mode_d_echange_proposition === "En_ligne" ? "En ligne" :
                                    data.Mode_d_echange_proposition === "presentiel" ? "Présentiel" :
                                    "En ligne ou présentiel (si possible)"}
                                </span>
                                <span><strong class="titre">Lieu :</strong> ${data.Lieu_proposition ?? ''}</span>
                                <span><strong class="titre">Point demandé :</strong> ${data.point ?? ''} pt${(data.point ?? 0) > 1 ? 's' : ''}</span>
                            </div>
                        </div>

                        <!-- Informations profil utilisateur -->
                        <div class="px-4 flex flex-col gap-3">
                            <h3 class="text-lg font-semibold text-gray-800 titre">À propos de ${data.prenom ?? ''}</h3>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Email :</span> ${data.email ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Téléphone :</span> ${data.telephone ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Localisation :</span> ${data.localisation ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Bio :</span> ${data.bio ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Domaine principal :</span> ${data.Domaine_principal ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Compétences principales :</span> ${data.Competences_principales ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Niveau :</span> ${data.niveau ?? ''}</p>
                            <p class="text-gray-700 text-md paragraphe"><span class="font-semibold titre">Genre :</span> ${data.sexe ?? ''}</p>
                        </div>
                    </div>
                `;
            }

        } catch (err) {
            console.error("Erreur lors de l'envoi de la vue :", err);
        }
    });
});

btnCloseVue.addEventListener('click', closeModal);

modalsvoirplus.addEventListener('click', (e) => {
    if (e.target === modalsvoirplus) {
        closeModal();
    }
});
