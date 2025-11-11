const recherche_par_nom_form = document.querySelector('#recherche_par_nom_form');
const nom_input = document.querySelector('#nom_de_la_recherhe');
const container = document.querySelector('.container');
const pagination_container = document.querySelector('.pagination_container');
const nombre_de_proposition = document.querySelector('.nombre_de_proposition');

recherche_par_nom_form.addEventListener('submit', async (e) => {
    e.preventDefault(); 

    const nom_de_la_recherche = nom_input.value.trim();
    
    try {
        const response = await fetch('../scripts/recherche_par_nom.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({nom_de_la_recherche})
        });

        if (!response.ok) throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);

        const result = await response.json();

        if (result.success) {
            recherche_par_nom_form.reset();
            nombre_de_proposition.textContent = result.nombre;

            // Vider les containers
            container.replaceChildren();
            pagination_container.replaceChildren();

            // Boucle sur les données
            result.data.forEach(proposition => {

                const card = document.createElement('div');
                card.className = "w-full h-90 bg-white rounded-lg p-4 space-y-1";

                // --- Bloc supérieur : avatar + nom + lieu + date ---
                const top = document.createElement('div');
                top.className = "w-full h-20 flex justify-start items-start gap-2";

                // Avatar
                const avatarDiv = document.createElement('div');
                avatarDiv.className = "h-16 w-16 bg-black rounded-lg flex justify-center items-center relative";


                const id_proprietaire = proposition.id_utilisateur;
                
                const buttonSuivre = document.createElement('button');
                buttonSuivre.className = "follow_btn w-5 h-5 cursor-pointer absolute bottom-0 right-0 transition flex justify-center items-center rounded-md";
                buttonSuivre.type = "button";
                buttonSuivre.dataset.follow = id_proprietaire;

                if (proposition.est_abonne) {
                    // ✅ Déjà abonné
                    buttonSuivre.classList.add("bg-green-500");
                    buttonSuivre.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#fff" fill-rule="evenodd" d="m6 10l-2 2l6 6L20 8l-2-2l-8 8z"/>
                        </svg>
                    `;
                    
                } else {
                    // ➕ Non abonné
                    buttonSuivre.classList.add("bg-[#3B82F6]");
                    buttonSuivre.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 24 24">
                            <path fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M12 19V5m7 7H5"/>
                        </svg>
                    `;
                }

                avatarDiv.appendChild(buttonSuivre);
                            

                const nomInitial = proposition.nom ? proposition.nom[0].toUpperCase() : 'N';
                const prenomInitial = proposition.prenom ? proposition.prenom[0].toUpperCase() : 'N';
                // couleur hash (tu peux remplacer par une couleur fixe ou générer hash si besoin)
                const color = '#'+Math.floor(Math.random()*16777215).toString(16);

                const spanAvatar = document.createElement('span');
                spanAvatar.className = "font-bold text-2xl";
                spanAvatar.style.color = color;
                spanAvatar.textContent = nomInitial + prenomInitial;
                avatarDiv.appendChild(spanAvatar);

                // Infos nom + lieu
                const infosDiv = document.createElement('div');

                const h2Name = document.createElement('h2');
                h2Name.className = "text-sm font-semibold titre";
                h2Name.textContent = `${proposition.nom} ${proposition.prenom}`;
                infosDiv.appendChild(h2Name);

                const lieuDiv = document.createElement('div');
                lieuDiv.className = "w-full h-6 flex justify-start items-center gap-1";

                const lieuSpan = document.createElement('span');
                lieuSpan.className = "text-black paragraphe text-md font-medium";
                lieuSpan.textContent = proposition.Lieu_proposition || '';

                // ✅ Créer un conteneur temporaire pour convertir le SVG string en élément réel
                const svgWrapper = document.createElement('div');
                svgWrapper.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M12 2c-4.4 0-8 3.6-8 8c0 5.4 7 11.5 7.3 11.8c.2.1.5.2.7.2s.5-.1.7-.2C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8m0 17.7c-2.1-2-6-6.3-6-9.7c0-3.3 2.7-6 6-6s6 2.7 6 6s-3.9 7.7-6 9.7M12 6c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/>
                    </svg>
                `;
                const svgLieu = svgWrapper.firstElementChild;

                lieuDiv.appendChild(svgLieu);
                lieuDiv.appendChild(lieuSpan);

                infosDiv.appendChild(lieuDiv);


                // Date
                const dateDiv = document.createElement('div');
                dateDiv.className = "ml-auto";

                const dateSpan = document.createElement('span');
                dateSpan.className = "w-full h-20 text-gray-500 paragraphe text-sm";
                if (proposition.created_at) {
                    const d = new Date(proposition.created_at);
                    dateSpan.textContent = d.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short', year: 'numeric' });
                }
                dateDiv.appendChild(dateSpan);

                top.appendChild(avatarDiv);
                top.appendChild(infosDiv);
                top.appendChild(dateDiv);

                card.appendChild(top);

                // --- Titre compétence ---
                const competenceDiv = document.createElement('div');
                competenceDiv.className = "w-full h-6 flex justify-start items-center gap-1";

                const h2Competence = document.createElement('h2');
                h2Competence.className = "text-md font-semibold titre text-gray-500";
                h2Competence.textContent = proposition.Titre_de_la_competence || '';
                competenceDiv.appendChild(h2Competence);

                card.appendChild(competenceDiv);

                // --- Niveau et note ---
                const niveauDiv = document.createElement('div');
                niveauDiv.className = "w-full h-8 flex justify-between items-center";

                const niveauSpan = document.createElement('div');
                niveauSpan.className = "paragraphe rounded-lg";
                niveauSpan.textContent = proposition.niveau_propose || '';
                niveauDiv.appendChild(niveauSpan);

                const noteDiv = document.createElement('div');
                noteDiv.className = "paragraphe rounded-lg flex justify-center items-center";
                noteDiv.innerHTML = `<span>${proposition.note_moyenne || ''}</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                    </svg>
                </span>`;
                niveauDiv.appendChild(noteDiv);
                card.appendChild(niveauDiv);

                const pointsDiv = document.createElement('div');
                pointsDiv.className = "paragraphe rounded-lg flex justify-center items-center";

                pointsDiv.innerHTML = `
                    <span>${proposition.point || '0'} pts</span>
                    ${proposition.type === 'recherche' 
                        ? `<span class="w-12 h-8 rounded-lg flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <g fill="none">
                                    <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.105.074l.014.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.092l.01-.009l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                    <path fill="#EF4444" d="M18 5a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V8.414l-9.95 9.95a1 1 0 0 1-1.414-1.414L15.586 7H10a1 1 0 1 1 0-2z"/>
                                </g>
                            </svg>
                        </span>`
                        : `<span class="w-12 h-8 rounded-lg flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="none" stroke="#22C55E" stroke-linecap="round" stroke-width="2" d="M17.657 6.343L6.343 17.657m0-8.485v8.485h8.485"/>
                            </svg>
                        </span>`
                    }
                `;

                niveauDiv.appendChild(pointsDiv);


                // --- Description ---
                const descDiv = document.createElement('div');
                descDiv.className = "w-full h-20 text-black paragraphe text-md";
                let desc = proposition.description_proposition || '';
                descDiv.textContent = desc.length > 170 ? desc.substr(0, 170) + " ..." : desc;
                card.appendChild(descDiv);

                // --- Mode d'échange ---
                const modeDiv = document.createElement('div');
                modeDiv.className = "w-full h-14 flex justify-start items-center gap-4";
                const modeSpan = document.createElement('span');
                modeSpan.className = "paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm";
                if (proposition.Mode_d_echange_proposition === "En_ligne") modeSpan.textContent = "En ligne";
                else if (proposition.Mode_d_echange_proposition === "presentiel") modeSpan.textContent = "présentiel";
                else modeSpan.textContent = "En ligne ou présentiel (si possible)";
                // type proposition
                const typeSpans = document.createElement('span');
                
                if(proposition.type === 'proposition'){
                    typeSpans.textContent = "Proposition";
                    typeSpans.className = "paragraphe bg-blue-600/20 px-4 py-1 rounded-lg text-sm";
                } else{
                    typeSpans.textContent = "Recherche";
                    typeSpans.className = "paragraphe bg-green-600/20 px-4 py-1 rounded-lg text-sm";
                }


                modeDiv.appendChild(modeSpan);
                modeDiv.appendChild(typeSpans);
                card.appendChild(modeDiv);



                // --- Boutons et icônes ---

                const actionsDiv = document.createElement('div');
                actionsDiv.className = "w-full h-12 flex justify-between items-center";
                const btnDiv = document.createElement('div');
                const btn = document.createElement('div');
                btn.className = "btn_invivtation w-full text-white py-2 px-4 rounded-lg font-medium transition paragraphe";
                btn.classList.add(
                    'btn_invivtation',
                    'w-full',
                    'py-2',
                    'px-4',
                    'rounded-lg',
                    'font-medium',
                    'transition',
                    'paragraphe',
                    'text-white'
                );

                btn.dataset.post_id = proposition.id;
                btn.dataset.invitation = proposition.id_utilisateur;
                btn.dataset.type = proposition.type;

                const status = proposition.status_invitation;
                const type = proposition.type;

                //  Équivalent de ton code PHP

                if (status === "en_attente") {
                    btn.classList.add('bg-black/50', 'hover:bg-[#3396D3]');
                    btn.textContent = "En attente de réponse";
                } 

                else if (status === "acceptee") {
                    btn.classList.add('bg-green-500');
                    btn.textContent = "Vous êtes en discussion";
                } 

                else {
                    if (type === "recherche") {
                        btn.classList.add('bg-black', 'hover:bg-[#3396D3]');
                        btn.textContent = "Proposer mon aide";
                        btn.dataset.recherche = "recherche";
                    } else {
                        btn.classList.add('bg-black', 'hover:bg-[#3396D3]');
                        btn.textContent = "Demander cette compétence";
                        btn.dataset.proposition = "proposition";
                    }
                }

                btnDiv.appendChild(btn);
                actionsDiv.appendChild(btnDiv);

                

                // Like + Explorer + Type
                const iconsDiv = document.createElement('div');
                iconsDiv.className = "flex justify-start items-center gap-3";

                // Like
                const likeBtn = document.createElement('button');
                likeBtn.className = "likeBtn w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20";
                likeBtn.dataset.like = proposition.id;
                likeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595m6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584c.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a1 1 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002"/></svg>`;
                iconsDiv.appendChild(likeBtn);

                // Explorer
                const explorerLink = document.createElement('a');
                explorerLink.href = `explorer?offre_id=${proposition.id}`;
                explorerLink.className = "w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20";
                explorerLink.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <g fill="none" stroke="#000" stroke-width="2">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M21 12s-1-8-9-8s-9 8-9 8" />
                    </g>
                </svg>`;
                iconsDiv.appendChild(explorerLink);

                // Type
                const typeSpan = document.createElement('span');
                typeSpan.className = "w-12 h-8 rounded-lg flex justify-center items-center";
                typeSpan.innerHTML = proposition.type === 'recherche' ? 
                    `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z"></svg>` :
                    `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#EAB308" d="M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7M9 21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1H9z"/></svg>`;
                iconsDiv.appendChild(typeSpan);

                actionsDiv.appendChild(iconsDiv);
                card.appendChild(actionsDiv);

                container.appendChild(card);
            });            

        } else {
            console.log(result.message);
        }
    } catch (err) {
        console.error("Erreur fetch :", err);
    }
});

const categories = [
    "Informatique_&_Programmation",
    "Design_&_Arts_visuels",
    "Musique_&_Chant",
    "Langues_&_Traduction",
    "Enseignement_&_Formation",
    "Photographie_&_Vidéo",
    "Bricolage_&_Artisanat",
    "Cuisine_&_Pâtisserie",
    "Sport_&_Bien-être",
    "Agriculture_&_Jardinage",
    "Communication_&_Marketing",
    "Entrepreneuriat_&_Gestion",
    "Théâtre_&_Expression_artistique",
    "Couture_&_Mode",
    "Innovation_&_Technologie",
    "Développement_personnel",
    "Éducation_&_Pédagogie",
    "Électronique_&_Mécanique",
    "Écologie_&_Développement_durable"
];

const niveaux = [
    "Débutant", 
    "Intermédiaire", 
    "Avancé"
];

const modes = [
    "En_ligne", 
    "Présentiel"
];

const moments = [
    "Matinée", 
    "Après_midi", 
    "Flexible", 
    "Soirs", 
    "Week_end"
];

document.addEventListener('DOMContentLoaded', () => {
    // declarations des variables
    const form_filtrage = document.querySelector('.form_filtrage');
    const btn_filtrage_reset = document.querySelector('#btn_filtrage_reset');
    
    const inputs_c = categories.map(cat => document.getElementById(cat));
    const inputs_n = niveaux.map(cat => document.getElementById(cat));
    const inputs_modes = modes.map(cat => document.getElementById(cat));
    const inputs_moments = moments.map(cat => document.getElementById(cat));


    // envoie des input
    form_filtrage.addEventListener('submit', async(e) => {
        e.preventDefault();

        // boucle categories
        const valeursCochees_c = inputs_c
            .filter(input => input && input.checked)
            .map(input => input.value);


        // boucle niveaux
        const valeursCochees_n = inputs_n
            .filter(input => input && input.checked)
            .map(input => input.value);


        // boucle niveaux
        const valeursCochees_mode = inputs_modes
            .filter(input => input && input.checked)
            .map(input => input.value);


        // boucle niveaux
        const valeursCochees_moments = inputs_moments
            .filter(input => input && input.checked)
            .map(input => input.value);

        const data =  {valeursCochees_c, valeursCochees_n, valeursCochees_mode, valeursCochees_moments};
            try {
                const response = await fetch('../scripts/recherche_par_filtrage.php', {
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
                    nombre_de_proposition.textContent = result.nombre;

                    // Vider les containers
                    container.replaceChildren();
                    pagination_container.replaceChildren();

                    // Boucle sur les données
                    result.data.forEach(proposition => {
                        const card = document.createElement('div');
                        card.className = "w-full bg-white rounded-lg p-4 space-y-1";

                        // --- Bloc supérieur : avatar + nom + lieu + date ---
                        const top = document.createElement('div');
                        top.className = "w-full h-20 flex justify-start items-start gap-2";

                        // Avatar
                        const avatarDiv = document.createElement('div');
                        avatarDiv.className = "h-16 w-16 bg-black rounded-lg flex justify-center items-center relative";

                        const id_proprietaire = proposition.id_utilisateur;
                
                        const buttonSuivre = document.createElement('button');
                        buttonSuivre.className = "follow_btn w-5 h-5 cursor-pointer absolute bottom-0 right-0 transition flex justify-center items-center rounded-md";
                        buttonSuivre.type = "button";
                        buttonSuivre.dataset.follow = id_proprietaire;

                        if (proposition.est_abonne) {
                            // ✅ Déjà abonné
                            buttonSuivre.classList.add("bg-green-500");
                            buttonSuivre.innerHTML = `
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                    <path fill="#fff" fill-rule="evenodd" d="m6 10l-2 2l6 6L20 8l-2-2l-8 8z"/>
                                </svg>
                            `;
                            
                        } else {
                            // ➕ Non abonné
                            buttonSuivre.classList.add("bg-[#3B82F6]");
                            buttonSuivre.innerHTML = `
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M12 19V5m7 7H5"/>
                                </svg>
                            `;
                        }

                        avatarDiv.appendChild(buttonSuivre);

                        const nomInitial = proposition.nom ? proposition.nom[0].toUpperCase() : 'N';
                        const prenomInitial = proposition.prenom ? proposition.prenom[0].toUpperCase() : 'N';
                        // couleur hash (tu peux remplacer par une couleur fixe ou générer hash si besoin)
                        const color = '#'+Math.floor(Math.random()*16777215).toString(16);

                        const spanAvatar = document.createElement('span');
                        spanAvatar.className = "font-bold text-2xl";
                        spanAvatar.style.color = color;
                        spanAvatar.textContent = nomInitial + prenomInitial;
                        avatarDiv.appendChild(spanAvatar);

                        // Infos nom + lieu
                        const infosDiv = document.createElement('div');

                        const h2Name = document.createElement('h2');
                        h2Name.className = "text-sm font-semibold titre";
                        h2Name.textContent = `${proposition.nom} ${proposition.prenom}`;
                        infosDiv.appendChild(h2Name);

                        const lieuDiv = document.createElement('div');
                        lieuDiv.className = "w-full h-6 flex justify-start items-center gap-1";

                        const lieuSpan = document.createElement('span');
                        lieuSpan.className = "text-black paragraphe text-md font-medium";
                        lieuSpan.textContent = proposition.Lieu_proposition || '';
                        lieuDiv.appendChild(lieuSpan);

                        infosDiv.appendChild(lieuDiv);

                        // Date
                        const dateDiv = document.createElement('div');
                        dateDiv.className = "ml-auto";

                        const dateSpan = document.createElement('span');
                        dateSpan.className = "w-full h-20 text-gray-500 paragraphe text-sm";
                        if (proposition.created_at) {
                            const d = new Date(proposition.created_at);
                            dateSpan.textContent = d.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short', year: 'numeric' });
                        }
                        dateDiv.appendChild(dateSpan);

                        top.appendChild(avatarDiv);
                        top.appendChild(infosDiv);
                        top.appendChild(dateDiv);

                        card.appendChild(top);

                        // --- Titre compétence ---
                        const competenceDiv = document.createElement('div');
                        competenceDiv.className = "w-full h-6 flex justify-start items-center gap-1";

                        const h2Competence = document.createElement('h2');
                        h2Competence.className = "text-md font-semibold titre text-gray-500";
                        h2Competence.textContent = proposition.Titre_de_la_competence || '';
                        competenceDiv.appendChild(h2Competence);

                        card.appendChild(competenceDiv);

                        // --- Niveau et note ---
                        const niveauDiv = document.createElement('div');
                        niveauDiv.className = "w-full h-8 flex justify-between items-center";

                        const niveauSpan = document.createElement('div');
                        niveauSpan.className = "paragraphe rounded-lg";
                        niveauSpan.textContent = proposition.niveau_propose || '';
                        niveauDiv.appendChild(niveauSpan);

                        const noteDiv = document.createElement('div');
                        noteDiv.className = "paragraphe rounded-lg flex justify-center items-center";
                        noteDiv.innerHTML = `<span>${proposition.note_moyenne || ''}</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                            </svg>
                        </span>`;
                        niveauDiv.appendChild(noteDiv);
                        card.appendChild(niveauDiv);

                        const pointsDiv = document.createElement('div');
                        pointsDiv.className = "paragraphe rounded-lg flex justify-center items-center";

                        pointsDiv.innerHTML = `
                            <span>${proposition.point || '0'} pts</span>
                            ${proposition.type === 'recherche' 
                                ? `<span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.105.074l.014.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.092l.01-.009l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                            <path fill="#EF4444" d="M18 5a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V8.414l-9.95 9.95a1 1 0 0 1-1.414-1.414L15.586 7H10a1 1 0 1 1 0-2z"/>
                                        </g>
                                    </svg>
                                </span>`
                                : `<span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="#22C55E" stroke-linecap="round" stroke-width="2" d="M17.657 6.343L6.343 17.657m0-8.485v8.485h8.485"/>
                                    </svg>
                                </span>`
                            }
                        `;

                        niveauDiv.appendChild(pointsDiv);


                        // --- Description ---
                        const descDiv = document.createElement('div');
                        descDiv.className = "w-full h-20 text-black paragraphe text-md";
                        let desc = proposition.description_proposition || '';
                        descDiv.textContent = desc.length > 170 ? desc.substr(0, 170) + " ..." : desc;
                        card.appendChild(descDiv);

                        // --- Mode d'échange ---
                        const modeDiv = document.createElement('div');
                        modeDiv.className = "w-full h-14 flex justify-start items-center gap-4";
                        const modeSpan = document.createElement('span');
                        modeSpan.className = "paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm";
                        if (proposition.Mode_d_echange_proposition === "En_ligne") modeSpan.textContent = "En ligne";
                        else if (proposition.Mode_d_echange_proposition === "presentiel") modeSpan.textContent = "présentiel";
                        else modeSpan.textContent = "En ligne ou présentiel (si possible)";
                        modeDiv.appendChild(modeSpan);
                        card.appendChild(modeDiv);

                        // type proposition
                        const typeSpans = document.createElement('span');
                        
                        if(proposition.type === 'proposition'){
                            typeSpans.textContent = "Proposition";
                            typeSpans.className = "paragraphe bg-blue-600/20 px-4 py-1 rounded-lg text-sm";
                        } else{
                            typeSpans.textContent = "Recherche";
                            typeSpans.className = "paragraphe bg-green-600/20 px-4 py-1 rounded-lg text-sm";
                        }


                        modeDiv.appendChild(modeSpan);
                        modeDiv.appendChild(typeSpans);
                        card.appendChild(modeDiv);


                        // --- Boutons et icônes ---
                            const actionsDiv = document.createElement('div');
                            actionsDiv.className = "w-full h-12 flex justify-between items-center";
                            const btnDiv = document.createElement('div');
                            const btn = document.createElement('div');
                            btn.className = "btn_invivtation w-full text-white py-2 px-4 rounded-lg font-medium transition paragraphe";
                            btn.classList.add(
                                'btn_invivtation',
                                'w-full',
                                'py-2',
                                'px-4',
                                'rounded-lg',
                                'font-medium',
                                'transition',
                                'paragraphe',
                                'text-white'
                            );

                            btn.dataset.post_id = proposition.id;
                            btn.dataset.invitation = proposition.id_utilisateur;
                            btn.dataset.type = proposition.type;

                            const status = proposition.status_invitation;
                            const type = proposition.type;

                            //  Équivalent de ton code PHP

                            if (status === "en_attente") {
                                btn.classList.add('bg-black/50', 'hover:bg-[#3396D3]');
                                btn.textContent = "En attente de réponse";
                            } 

                            else if (status === "acceptee") {
                                btn.classList.add('bg-green-500');
                                btn.textContent = "Vous êtes en discussion";
                            } 

                            else {
                                if (type === "recherche") {
                                    btn.classList.add('bg-black', 'hover:bg-[#3396D3]');
                                    btn.textContent = "Proposer";
                                    btn.dataset.recherche = "recherche";
                                } else {
                                    btn.classList.add('bg-black', 'hover:bg-[#3396D3]');
                                    btn.textContent = "Demander";
                                    btn.dataset.proposition = "proposition";
                                }
                            }

                            btnDiv.appendChild(btn);
                            actionsDiv.appendChild(btnDiv);
                        


                        // Like + Explorer + Type
                        const iconsDiv = document.createElement('div');
                        iconsDiv.className = "flex justify-start items-center gap-3";

                        // Like
                        const likeBtn = document.createElement('button');
                        likeBtn.className = "likeBtn w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20";
                        likeBtn.dataset.like = proposition.id;
                        likeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595m6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584c.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a1 1 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002"/></svg>`;
                        iconsDiv.appendChild(likeBtn);

                        // Explorer
                        const explorerLink = document.createElement('a');
                        explorerLink.href = `explorer?offre_id=${proposition.id}`;
                        explorerLink.className = "w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20";
                        explorerLink.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <g fill="none" stroke="#000" stroke-width="2">
                                <circle cx="12" cy="12" r="3" />
                                <path d="M21 12s-1-8-9-8s-9 8-9 8" />
                            </g>
                        </svg>`;
                        iconsDiv.appendChild(explorerLink);

                        // Type
                        const typeSpan = document.createElement('span');
                        typeSpan.className = "w-12 h-8 rounded-lg flex justify-center items-center";
                        typeSpan.innerHTML = proposition.type === 'recherche' ? 
                            `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z"></svg>` :
                            `<svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#EAB308" d="M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7M9 21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1H9z"/></svg>`;
                        iconsDiv.appendChild(typeSpan);

                        actionsDiv.appendChild(iconsDiv);
                        card.appendChild(actionsDiv);

                        container.appendChild(card);
                    });

                } 
                else {
                    showAlert(result.message, false);
                }
            }
            catch (err) {
                showAlert("Une erreur est survenue. Veuillez réessayer", false);
            }
    });

    //reset 
    btn_filtrage_reset.addEventListener('click', () => {
        form_filtrage.reset();
    });

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

});
