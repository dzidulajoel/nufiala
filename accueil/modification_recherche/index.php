<?php
require_once('../../config/auth.php');
require_once('../../scripts/read_modification.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://api.fontshare.com/v2/css? f[]=melodrama@500,600,700,1&f[]=satoshi@400,500,700&f[]=general-sans@500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/swipe.css">

    <style>

        .titre {
                font-family: 'General Sans', sans-serif;
            }

        .sous_titre {
            font-family: 'Melodrama', serif;
        }

        .paragraphe {
            font-family: 'Satoshi', sans-serif;
        }

        .df_jcc_iac_g2 {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px
        }

        .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;     
        }

        .no-scrollbar::-webkit-scrollbar {
        display: none;             
        }
        
    </style>

</head>
<body class="w-full h-screen flex flex-col relative">

    <main id="sections" class="h-screen w-full flex flex-col justify-between bg-black/10">

        <!-- HEADERSEARCH  -->
        <div class="w-full h-[8vh] px-4 py-3 flex justify-between items-center ">

            <div class="w-[13vw] h-full flex justify-start items-center gap-4">

                <a href="../" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="-6 0 24 24"><path fill="#000" fill-rule="evenodd" d="m3.343 12l7.071 7.071L9 20.485l-7.778-7.778a1 1 0 0 1 0-1.414L9 3.515l1.414 1.414z"/></svg>
                </a>

                <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z" />
                    </svg>
                    <span class="text-xl font-semibold titre">Nufiala</span>
                </a>

            </div>

            <div class="w-[12vw] h-full flex justify-end items-center gap-2">

                <span class="deconnexion w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <g fill="#000">
                            <path fill-rule="evenodd" d="M11 20a1 1 0 0 0-1-1H5V5h5a1 1 0 1 0 0-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h5a1 1 0 0 0 1-1" clip-rule="evenodd" />
                            <path d="M21.714 12.7a1 1 0 0 0 .286-.697v-.006a1 1 0 0 0-.293-.704l-4-4a1 1 0 1 0-1.414 1.414L18.586 11H9a1 1 0 1 0 0 2h9.586l-2.293 2.293a1 1 0 0 0 1.414 1.414l4-4z" />
                        </g>
                    </svg>
                </span>

            </div>

        </div>

        <section id="section2" class="section w-full h-[92vh] flex justify-between items-center p-4">
            <div id="chercher_une_competence" class="w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 justify-center items-center">
                <div class="bg-white h-auto shadow-lg rounded-lg w-full max-w-2xl p-4 relative">
                    <h1 class="text-2xl font-bold text-gray-800 text-center titre mt-2 flex justify-center gap-2 items-center">Modifier la compétence proposée <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M3.25 22a.75.75 0 0 1 .75-.75h16a.75.75 0 0 1 0 1.5H4a.75.75 0 0 1-.75-.75" clip-rule="evenodd"/><path fill="#000" d="m11.52 14.929l5.917-5.917a8.2 8.2 0 0 1-2.661-1.787a8.2 8.2 0 0 1-1.788-2.662L7.07 10.48c-.462.462-.693.692-.891.947a5.2 5.2 0 0 0-.599.969c-.139.291-.242.601-.449 1.22l-1.088 3.267a.848.848 0 0 0 1.073 1.073l3.266-1.088c.62-.207.93-.31 1.221-.45q.518-.246.969-.598c.255-.199.485-.43.947-.891m7.56-7.559a3.146 3.146 0 0 0-4.45-4.449l-.71.71l.031.09c.26.749.751 1.732 1.674 2.655A7 7 0 0 0 18.37 8.08z"/></svg></h1>
                    <p class="text-gray-500 text-center mb-4 paragraphe">Trouvez un membre prêt à vous aider à apprendre une nouvelle compétence.</p>

                    <form id="chercher_form" class="space-y-5">
                        <!-- Compétence recherchée -->
                        <div>
                            <label for="titre_Competence_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Compétence recherchée</label>
                            <input id="titre_Competence_recherche" value="<?= htmlspecialchars(trim(($proposition['Titre_de_la_competence'] ?? ''))) ?>" type="text" placeholder="Ex : Apprendre HTML, Cours de guitare" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required />
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="categorie_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                            <select id="categorie_recherche" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                <?php foreach ($domaines as $domaine): ?>
                                    <option value="<?= htmlspecialchars($domaine) ?>" 
                                        <?= isset($proposition['categorie_proposition']) && $domaine === $proposition['categorie_proposition'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($domaine) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Niveau -->
                        <div>
                            <label for="niveau_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau proposé</label>
                            <select id="niveau_recherche" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required>
                                <option value="">Sélectionnez un niveau</option>
                                <option class="text-md paragraphe" value="debutant" <?= ($proposition['niveau_propose'] ?? '') === 'Débutant' ? 'selected' : '' ?>>Débutant</option>
                                <option class="text-md paragraphe" value="intermediaire" <?= ($proposition['niveau_propose'] ?? '') === 'Intermédiaire' ? 'selected' : '' ?>>Intermédiaire</option>
                                <option class="text-md paragraphe" value="avance" <?= ($proposition['niveau_propose'] ?? '') === 'Avancé' ? 'selected' : '' ?>>Avancé</option>
                            </select>
                        </div>

                        <!-- Description / Objectif -->
                        <div>
                            <label for="description_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Objectif personnel</label>
                            <textarea id="description_recherche" placeholder="Expliquez ce que vous souhaitez apprendre ou vos motivations..." rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required><?= htmlspecialchars(trim(($proposition['description_proposition'] ?? ''))) ?></textarea>
                        </div>

                        <!-- Disponibilité -->
                        <div>
                            <label for="Disponibilite_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                            <input id="Disponibilite_recherche" value="<?= htmlspecialchars(trim(($proposition['Disponibilite_proposition'] ?? ''))) ?>" type="text" placeholder="Ex : Lundi et Mercredi, de 18h - 20h" value="<?= htmlspecialchars($data_utilisateur['Disponibilite'] ?? "") ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                        </div>

                        <!-- Type d’échange -->
                        <div class="w-full">
                            <label for="Mode_d_echange_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe"> Type d'échange </label>
                            <select id="Mode_d_echange_recherche" class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                <option value="En_ligne" <?= ( ($proposition['Mode_d_echange_proposition'] ?? '') === 'En_ligne' ? 'selected' : '') ?>>En ligne</option>
                                <option value="presentiel" <?= ( ($proposition['Mode_d_echange_proposition'] ?? '') === 'presentiel' ? 'selected' : '') ?>>Présentiel</option>
                                <option value="les_deux" <?= ( ($proposition['Mode_d_echange_proposition'] ?? '') === 'les_deux' ? 'selected' : '') ?>>En ligne ou présentiel (si possible)</option>
                            </select>
                        </div>

                        <!-- Lieu (optionnel) -->
                        <div>
                            <label for="Lieu_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Lieu (optionnel)</label>
                            <input id="Lieu_recherche" value="<?= htmlspecialchars($proposition['Lieu_proposition'] ?? '') ?>" type="text" placeholder="Ex : Lomé, quartier Adidogomé" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                        </div>

                        <!-- CTA -->
                        <button data-post_id = "<?= htmlspecialchars($offre_id) ?>" type="submit" id="btn_recherche" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Rechercher un mentor</button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <script src="../../js/modifier_recherche.js"></script>

</body>
</html>
