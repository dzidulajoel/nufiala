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
<body class="p-4 w-full h-screen flex flex-col">
    <main class="h-screen w-full rounded-lg flex justify-center items-center gap-4">
        
        <nav class="w-[12vw] h-full bg-black/10 rounded-lg flex flex-col justify-start items-start py-2 px-4 relative hidden">
            <h1 class="w-full flex justify-start items-center ">

                <a href="./" class="text-lg font-bold titre logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="#000" d="M13 7.83c.85-.3 1.53-.98 1.83-1.83H18l-3 7c0 1.66 1.57 3 3.5 3s3.5-1.34 3.5-3l-3-7h2V4h-6.17c-.41-1.17-1.52-2-2.83-2s-2.42.83-2.83 2H3v2h2l-3 7c0 1.66 1.57 3 3.5 3S9 14.66 9 13L6 6h3.17c.3.85.98 1.53 1.83 1.83V19H2v2h20v-2h-9zM20.37 13h-3.74l1.87-4.36zm-13 0H3.63L5.5 8.64zM12 6c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1"/></svg>
                </a>

                <button class="absolute top-2 right-2 bg-black/10 w-8 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M11.67 3.87L9.9 2.1L0 12l9.9 9.9l1.77-1.77L3.54 12z"/></svg>
                </button>

            </h1>

            <div class="flex flex-col justify-between items-start h-full py-8 lien_conteneur transition-all duration-500 ease-in-out">

                <ul class="flex flex-col gap-4">

                    <li class="paragraphe text-md text-start">
                        <a href="#" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3z"/></svg>
                            <span class="lien" >Accueil</span>
                        </a>
                    </li>

                    <li class="paragraphe text-md text-start">
                        <a href="explorer" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m-1.396-11.396l-2.957 5.749l5.75-2.957l2.956-5.749l-5.75 2.957z"/></svg>
                            <span class="lien" >Explorer</span>
                        </a>
                    </li>

                    <li class="paragraphe text-md text-start">
                        <a href="#" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.35em" height="1.2em" viewBox="0 0 576 512"><path fill="#000" d="M268.9 85.2L152.3 214.8c-4.6 5.1-4.4 13 .5 17.9c30.5 30.5 80 30.5 110.5 0l31.8-31.8c4.2-4.2 9.5-6.5 14.9-6.9c6.8-.6 13.8 1.7 19 6.9L505.6 376l70.4-56V32L464 96l-23.8-15.9A96.2 96.2 0 0 0 386.9 64h-70.4c-1.1 0-2.3 0-3.4.1c-16.9.9-32.8 8.5-44.2 21.1m-152.3 97.5L223.4 64h-39.6c-25.5 0-49.9 10.1-67.9 28.1L112 96L0 32v288l156.4 130.3c23 19.2 52 29.7 81.9 29.7H254l-7-7c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l41 41h9c19.1 0 37.8-4.3 54.8-12.3L359 441c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l32 32l17.5-17.5c8.9-8.9 11.5-21.8 7.6-33.1L312.1 251.7l-14.9 14.9c-49.3 49.3-129.1 49.3-178.4 0c-23-23-23.9-59.9-2.2-84z"/></svg>
                            <span class="lien" >Partager</span>
                        </a>
                    </li>

                    <li class="paragraphe text-md text-start">
                        <a href="#" class="flex justify-start items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2"/></svg>
                            <span class="lien" >Échanges</span>
                        </a>
                    </li>

                </ul>

                <ul class="flex flex-col gap-4">

                    <li class="paragraphe text-md text-justify" >
                        <a href="#" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 2c4.97 0 9 4.043 9 9.031V20H3v-8.969C3 6.043 7.03 2 12 2M9.5 21h5a2.5 2.5 0 0 1-5 0"/></svg>
                            <span class="lien" >Notifications</span>
                        </a>
                    </li>

                    <li class="paragraphe text-md text-justify" >
                        <a href="#" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5"/><path fill="#000" fill-rule="evenodd" d="M12.68 2.806a1.4 1.4 0 0 0-1.36 0l-7.2 4A1.4 1.4 0 0 0 3.4 8.03v7.94c0 .509.276.977.72 1.224l7.2 4a1.4 1.4 0 0 0 1.36 0l7.2-4a1.4 1.4 0 0 0 .72-1.223V8.03a1.4 1.4 0 0 0-.72-1.224zM7.25 12a4.75 4.75 0 1 1 9.5 0a4.75 4.75 0 0 1-9.5 0" clip-rule="evenodd"/></svg>
                            <span class="lien" >Paramètres</span>
                        </a>
                    </li>

                    <li class="paragraphe text-md text-justify" >
                        <a href="#" class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M23.9917 6H6V42H24"/><path d="M33 33L42 24L33 15"/><path d="M16 23.9917H42"/></g></svg>                            
                            <span class="lien" >Déconnexion</span>
                        </a>
                    </li>

                </ul>

            </div>

        </nav> 

        <section class="w-full h-full rounded-lg p-4">
        
            <div class="w-full h-[6vh] bg-black">

            </div>
            <div class="w-full h-[90vh]">
                <!-- ACCUEIL -->
                <div id="section1" class="w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 hidden">
                    <div class="w-screen lg:w-[25vw] h-[30vh] lg:h-full rounded-lg flex justify-between gap-6 items-center flex-col">

                        <div class="w-full h-full flex flex-col justify-between">
                            <div class="bg-black w-full rounded-lg h-[30%]"></div>
                            <div class="flex flex-col justify-between h-[70%]">

                                <div class="flex flex-col justify-center items-center gap-2 py-8">
                                    <h2 class="titre text-md font-semibold">Gamatho Dzidula Joel</h2>
                                    <p class="paragraphe font-medium"><span>Dévéloppeur Web & Mobile</span> - <span>Togo</span></p>
                                </div>

                                <div class="flex justify-center items-center gap-4">
                                    <button class="w-full bg-black text-white py-2 rounded-lg font-medium paragraphe">45 Amis</button>
                                    <button class="w-full flex justify-center items-center gap-2 cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M8.707 19.707L18 10.414L13.586 6l-9.293 9.293a1 1 0 0 0-.263.464L3 21l5.242-1.03c.176-.044.337-.135.465-.263M21 7.414a2 2 0 0 0 0-2.828L19.414 3a2 2 0 0 0-2.828 0L15 4.586L19.414 9z"/></svg>
                                        Modifer
                                    </button>
                                </div>

                                <p class="paragraphe text-center">Passionné par la création d’expériences numériques intuitives et performantes, je conçois des applications web et mobiles modernes, du design jusqu’au déploiement. J’aime partager mes connaissances, apprendre de nouvelles technologies et collaborer sur des projets innovants.</p>
                                
                                <ul class="flex flex-col justify-center items-center gap-4">
                                    <li class="w-full flex justify-between items-center">
                                        <span>Suivis</span>
                                        <span>124</span>
                                    </li>
                                    <li class="w-full flex justify-between items-center">
                                        <span>Suivis</span>
                                        <span>124</span>
                                    </li>
                                    <li class="w-full flex justify-between items-center">
                                        <span>Note</span>
                                        <span>4.5</span>
                                    </li>
                                </ul>

                                <div class="flex flex-col justify-center items-center gap-4">
                                    <button type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Proposer une compétence</button>
                                    <button type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Chercher une compétence</button>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class="w-full lg:w-[75vw] h-full flex flex-col gap-4">
                        <div class="w-full h-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                            <div class="bg-black w-full h-[20vh] rounded-lg">
                                <div class="flex justify-between items-center p-4">
                                    <span class="paragraphe text-white ">Total Point</span>
                                    <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24"><path fill="#000" d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5S4.5 6.505 4.5 8.5S6.005 12 8 12"/></svg></span>
                                </div>
                                <div class="text-white flex justify-center items-center mt-8 text-2xl">100</div>
                            </div>

                            <div class="bg-black w-full h-[20vh] rounded-lg">
                                <div class="flex justify-between items-center p-4">
                                    <span class="paragraphe text-white ">Total dépensé</span>
                                    <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24"><path fill="#000" d="M14 11h8v2h-8zM4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5M4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1z"/></svg></span>
                                </div>
                                <div class="text-white flex justify-center items-center mt-8 text-2xl">100</div>
                            </div>

                            <div class="bg-black w-full h-[20vh] rounded-lg">
                                <div class="flex justify-between items-center p-4">
                                    <span class="paragraphe text-white ">Total gagné</span>
                                    <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24"><path fill="#000" d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1z"/></svg></span>
                                </div>
                                <div class="text-white flex justify-center items-center mt-8 text-2xl">100</div>
                            </div>

                        </div>

                        <div class="w-full h-[30vh] lg:h-full bg-black/10 rounded-lg"></div>
                    </div>
                </div>

                <!-- PROPOSER -->
                <div id="proposer_une_competence" class="w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 bg-black/10 justify-center items-center hidden">
                    <div class="bg-white h-[95%] shadow-lg rounded-2xl w-full max-w-2xl p-8">
                        <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre">Proposer une compétence</h1>
                        <p class="text-gray-500 text-center mb-4 paragraphe">Partagez votre savoir et aidez la communauté à grandir.</p>

                        <form class="space-y-4">
                            <!-- Titre -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Titre de la compétence</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Initiation à Photoshop"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                />
                            </div>

                            <!-- Catégorie -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option>Informatique</option>
                                    <option>Langues</option>
                                    <option>Musique</option>
                                    <option>Artisanat</option>
                                    <option>Design</option>
                                    <option>Autre</option>
                                </select>
                            </div>

                            <!-- Niveau -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau proposé</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Sélectionnez un niveau</option>
                                    <option>Débutant</option>
                                    <option>Intermédiaire</option>
                                    <option>Avancé</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Description</label>
                                <textarea
                                    placeholder="Décrivez votre compétence, vos méthodes et ce que vous proposez..."
                                    rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                ></textarea>
                            </div>

                            <!-- Disponibilité -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Lundi et Mercredi, de 18h à 20h"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                />
                            </div>

                            <!-- Type d’échange -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Type d’échange</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Choisissez le mode d’échange</option>
                                    <option>En ligne</option>
                                    <option>En présentiel</option>
                                </select>
                            </div>

                            <!-- Lieu (optionnel) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Lieu (optionnel)</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Lomé, quartier Adidogomé"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                />
                            </div>

                            <!-- Image/Vidéo -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Image ou vidéo (optionnel)</label>
                                <input
                                    type="file"
                                    accept="image/*,video/*"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 paragraphe focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                />
                            </div>

                            <!-- CTA -->
                            <button type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Publier ma compétence</button>
                        </form>
                        </div>

                </div>

                <!-- COMPETENCES -->
                <div id="chercher_une_competence" class="w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 bg-black/10 justify-center items-center hidden">
                    <div class="bg-white h-[95%] shadow-lg rounded-2xl w-full max-w-2xl p-8">
                        <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre">Chercher une compétence</h1>
                        <p class="text-gray-500 text-center mb-8 paragraphe">Trouvez un membre prêt à vous aider à apprendre une nouvelle compétence.</p>

                        <form class="space-y-5">
                            <!-- Compétence recherchée -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Compétence recherchée</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Apprendre HTML, Cours de guitare"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                />
                            </div>

                            <!-- Catégorie -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option>Informatique</option>
                                    <option>Langues</option>
                                    <option>Musique</option>
                                    <option>Artisanat</option>
                                    <option>Design</option>
                                    <option>Autre</option>
                                </select>
                            </div>

                            <!-- Niveau souhaité -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau souhaité</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Choisissez votre niveau actuel</option>
                                    <option>Débutant</option>
                                    <option>Intermédiaire</option>
                                    <option>Avancé</option>
                                </select>
                            </div>

                            <!-- Description / Objectif -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Objectif personnel</label>
                                <textarea
                                    placeholder="Expliquez ce que vous souhaitez apprendre ou vos motivations..."
                                    rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                ></textarea>
                            </div>

                            <!-- Disponibilité -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Soirs en semaine, week-end"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                />
                            </div>

                            <!-- Type d’échange -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Type d’échange préféré</label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                    required
                                >
                                    <option value="">Choisissez le mode d’échange</option>
                                    <option>En ligne</option>
                                    <option>En présentiel</option>
                                </select>
                            </div>

                            <!-- Localisation -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Localisation (optionnelle)</label>
                                <input
                                    type="text"
                                    placeholder="Ex : Lomé, quartier Kodjoviakopé"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                                />
                            </div>

                            <!-- CTA -->
                            <button type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Rechercher un mentor</button>
                        </form>
                    </div>
                </div>

                <!-- EXPLORER -->
                <div id="section2" class="w-full h-full bg-black/10 rounded-lg flex flex-col gap-4 hidden">

                    <div class="w-full h-[5%] px-4">
                        <h2 class="titre text-xl font-medium">Explorez les talents et compétences autour de vous</h2>
                        <p class="paragraphe text-sm">Découvrez des personnes prêtes à partager leurs savoirs ou à apprendre de vous</p>
                    </div>


                    <!-- <div class="w-full h-[7%] flex justify-center items-center gap-2">
                        <div>
                            <button class="h-8 px-4 bg-black/10 paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Précédent</button>
                            
                            <button class="w-8 h-8 paragraphe bg-[#3396D3] text-black rounded-lg font-medium">1</button>
                            <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">2</button>
                            <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">3</button>
                            <span class="text-black">...</span>
                            <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">8</button>

                            <button class="h-8 px-4 bg-black/10 paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Suivant</button>
                        </div>
                    </div> -->

                </div>

                <!-- PARTAGER -->
                <div id="section3" class="w-full h-full bg-black/10 rounded-lg flex flex-col gap-2 p-2 hidden">

                    <div class="w-full h-[5%] px-4">
                        <h2 class="titre text-xl font-medium">Partagez votre savoir, aidez la communauté</h2>
                        <p class="paragraphe text-sm">Proposez vos compétences, gagnez des points et créez des échanges enrichissants</p>
                    </div>

                    <div class="w-full h-[85%] p-4 ">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">

                            <!-- 1 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Gamatho Dzidula Joel</h2>
                                        <h3 class="paragraphe text-sm">Design UX/UI • Débutant</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Comprendre les bases du design d’interface et apprendre à utiliser Figma.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne ou présentiel (si possible)</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Lundi au jeudi (17h–20h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">35 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.5 <span class="text-yellow-500">★</span></span>
                                        <span>10 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 2 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Awa Konaté</h2>
                                        <h3 class="paragraphe text-sm">Développement Web • Intermédiaire</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Apprendre à créer un site dynamique avec PHP et MySQL.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne uniquement</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Week-end (10h–18h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">50 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.8 <span class="text-yellow-500">★</span></span>
                                        <span>25 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 3 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Yao Koffi</h2>
                                        <h3 class="paragraphe text-sm">Marketing Digital • Avancé</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Découvrir les stratégies de publicité Facebook et Google Ads.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">Présentiel uniquement</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Mardi & jeudi (9h–12h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">20 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.2 <span class="text-yellow-500">★</span></span>
                                        <span>8 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 4 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Fatou Diarra</h2>
                                        <h3 class="paragraphe text-sm">Cuisine Africaine • Débutante</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Partager mes recettes traditionnelles et apprendre la pâtisserie moderne.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">Présentiel</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Tous les soirs (18h–21h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">20 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.2 <span class="text-yellow-500">★</span></span>
                                        <span>8 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 5 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Julien N’Guessan</h2>
                                        <h3 class="paragraphe text-sm">Développement Mobile • Intermédiaire</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Créer une application Flutter de A à Z pour Android et iOS.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Samedi (10h–15h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">60 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.9 <span class="text-yellow-500">★</span></span>
                                        <span>30 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 6 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Linda Assou</h2>
                                        <h3 class="paragraphe text-sm">Anglais Conversationnel • Intermédiaire</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Pratique de la langue anglaise pour la communication quotidienne.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Lundi à vendredi (19h–21h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">40 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.6 <span class="text-yellow-500">★</span></span>
                                        <span>12 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 7 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Marc Dossou</h2>
                                        <h3 class="paragraphe text-sm">Photographie • Débutant</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Apprendre à utiliser un appareil photo professionnel et retoucher ses images.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">Présentiel</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Dimanche (10h–17h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">25 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.4 <span class="text-yellow-500">★</span></span>
                                        <span>9 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 8 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Cynthia Amouzou</h2>
                                        <h3 class="paragraphe text-sm">Gestion de Projet • Avancée</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Découvrir les méthodes Agile et Scrum pour gérer efficacement une équipe.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Vendredi (14h–18h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">20 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.2 <span class="text-yellow-500">★</span></span>
                                        <span>8 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 9 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Pauline Agbodan</h2>
                                        <h3 class="paragraphe text-sm">Coiffure • Intermédiaire</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Apprendre à tresser, coiffer et entretenir les cheveux naturels.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">Présentiel</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Mercredi & Samedi (15h–19h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">30 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.3 <span class="text-yellow-500">★</span></span>
                                        <span>11 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 10 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">David Ekomy</h2>
                                        <h3 class="paragraphe text-sm">Musique (Guitare) • Avancé</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Apprendre les techniques de guitare acoustique et électrique.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">Présentiel ou en ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Soirée (18h–21h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">55 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.7 <span class="text-yellow-500">★</span></span>
                                        <span>20 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 11 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Sarah N’Doye</h2>
                                        <h3 class="paragraphe text-sm">Création de Contenu • Intermédiaire</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Apprendre à planifier et créer du contenu engageant pour les réseaux sociaux.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Mardi & Jeudi (14h–18h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">45 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.6 <span class="text-yellow-500">★</span></span>
                                        <span>16 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                            <!-- 12 -->
                            <div class="w-full h-62 bg-white rounded-lg p-2 flex flex-col gap-3 relative">
                                <div class="flex justify-start items-center gap-4 h-14">
                                    <span class="w-10 h-10 rounded-lg bg-black"></span>
                                    <div>
                                        <h2 class="titre text-sm font-semibold">Jean-Baptiste Talla</h2>
                                        <h3 class="paragraphe text-sm">Développement Backend • Avancé</h3>
                                    </div>
                                </div>
                                <div class="w-full h-18">
                                    <p class="paragraphe text-start text-sm py-1">Créer une API REST sécurisée avec Node.js et MongoDB.</p>
                                </div>
                                <div class="w-full h-18">
                                    <h2 class="titre text-sm font-semibold">En ligne</h2>
                                    <h2 class="titre text-sm font-semibold">Disponibilité : Soir (19h–22h)</h2>
                                    <div class="flex justify-between items-center paragraphe text-sm mt-2">
                                        <span class="flex justify-center items-center gap-1">20 points <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#3396D3" d="M11 6H9V4h2zm4-2h-2v2h2zM9 14h2v-2H9zm10-4V8h-2v2zm0 4v-2h-2v2zm-6 0h2v-2h-2zm6-10h-2v2h2zm-6 4V6h-2v2zm-6 2V8h2V6H7V5c0-.55-.45-1-1-1s-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1v-7h2v-2zm8 2h2v-2h-2zm-4-2v2h2v-2zM9 8v2h2V8zm4 2h2V8h-2zm2-4v2h2V6z"/></svg> </span>
                                        <span>4.2 <span class="text-yellow-500">★</span></span>
                                        <span>8 Suivis</span>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center gap-4 h-10">
                                    <button class="paragraphe w-full bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition">Demander une aide</button>
                                </div>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-1"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 15c3.186 0 6.045.571 8 3.063V20H4v-1.937C5.955 15.57 8.814 15 12 15m0-3a4 4 0 1 1 0-8a4 4 0 0 1 0 8m8 2a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2h-1z"/></svg></span>
                                <span class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-8"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 20c-2.205-.48-9-4.24-9-11a5 5 0 0 1 9-3a5 5 0 0 1 9 3c0 6.76-6.795 10.52-9 11"/></svg></span>
                                <a href="#" class="w-6 h-6 flex justify-center items-center rounded-lg bg-black/10 absolute top-1 right-16"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M14 4h6v6l-2-2l-4 4l-2-2l4-4zm-4 16H4v-6l2 2l4-4l2 2l-4 4z"/></svg></a>
                            </div>

                        </div>

                        <div class="w-full h-[10%] flex justify-center items-center gap-2">
                            <div>
                                <button class="h-8 px-4 bg-black/10 paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Précédent</button>
                                
                                <button class="w-8 h-8 paragraphe bg-[#3396D3] text-black rounded-lg font-medium">1</button>
                                <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">2</button>
                                <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">3</button>
                                <span class="text-black">...</span>
                                <button class="w-8 h-8 paragraphe bg-black/10 text-black rounded-lg hover:bg-[#3396D3] transition">8</button>
            
                                <button class="h-8 px-4 bg-black/10 paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Suivant</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- PARAMETRES -->
                <div id="section4" class="w-full h-full bg-black/10 rounded-lg flex justify-center items-start p-8 gap-4 hidden">

                    <div class="w-1/2 flex flex-col gap-8 bg-white p-4 h-auto rounded-lg">

                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                            <div class="w-24 h-24 rounded-xl bg-black flex justify-center items-center text-white text-3xl font-bold">JD</div>
                                <div class="flex-1 text-center sm:text-left">
                                    <h1 class="titre text-2xl font-bold text-gray-800">Gamatho Dzidula Joel</h1>
                                    <p class="paragraphe text-gray-600">Développeur Web & Mobile • Intermédiaire</p>
                                    <p class="paragraphe text-gray-500 mt-1">Lomé, Togo • Membre depuis juin 2024</p>
                                </div>
                                <button class="bg-black text-white px-5 py-2 rounded-lg hover:bg-[#3396D3] transition paragraphe">Modifier le profil</button>
                            </div>

                            <div class="">
                                <h2 class="titre text-xl font-semibold mb-4 text-gray-800">Informations personnelles</h2>
                                <form class="space-y-4">

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom complet</label>
                                        <input type="text" value="Gamatho Dzidula Joel" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom d'utilisateur</label>
                                        <input type="text" value="joel_dev" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Email</label>
                                        <input type="email" value="joel@example.com" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Téléphone</label>
                                        <input type="text" value="+228 90 00 00 00" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Sexe</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                            <option>Homme</option>
                                            <option>Femme</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Date de naissance</label>
                                        <input type="date" value="2000-06-15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Pays</label>
                                        <input type="text" value="Togo" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                    </div>

                                    <div class="sm:col-span-2">
                                        <textarea rows="3" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">Passionné de technologie, j’aime créer des applications modernes et utiles pour résoudre des problèmes du quotidien.</textarea>
                                    </div>
                                </form>
                            </div>

                    </div>

                    <div class="w-1/2 flex flex-col gap-8 bg-white p-4 h-auto rounded-lg">
                        <div class="">
                            <h2 class="titre text-xl font-semibold mb-4 text-gray-800">Compétences & Disponibilités</h2>
                            <form class="space-y-8">

                                    <div class="w-full" >
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Domaine principal</label>
                                        <input type="text" value="Développement Web" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div class="w-full" >
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau</label>
                                        <select disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                            <option>Débutant</option>
                                            <option selected>Intermédiaire</option>
                                            <option>Avancé</option>
                                        </select>
                                    </div>


                                    <div class="w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                                        <input type="text" value="Lundi au jeudi (17h–20h)" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div class="w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Mode d'échange</label>
                                        <input type="text" value="En ligne ou présentiel (si possible)" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>
                                

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Compétences principales (séparées par des tirets)</label>
                                    <input type="text" value="HTML - React - Tailwind CSS - Node.js" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                </div>
                            </form>
                        </div>

                        <div class="flex flex-col gap-4">
                            <h2 class="titre text-xl font-semibold text-gray-800">Paramètres du compte</h2>
                            <div class="w-full flex flex-col justify-start items-center gap-4">
                                <button class="w-full cursor-pointer bg-[#3396D3] text-white py-2 px-6 rounded-lg font-medium hover:bg-[#3396D3]/80 transition paragraphe" >Changer le mot de passe</button>
                                <button class="w-full cursor-pointer bg-red-500 text-white py-2 px-6 rounded-lg font-medium hover:bg-red-600 transition paragraphe" >Supprimer le compte</button>
                                <button class="w-full cursor-pointer bg-black text-white py-2 px-6 rounded-lg font-medium hover:bg-black/80 transition paragraphe" >Sauvegarder les modifications</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- NOTIFICATIONS -->
                <div id="section5" class="w-full h-full p-4 rounded-lg hidden">
                    <label for="notif-modal" class="cursor-pointer bg-black text-white px-4 py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">
                        Notifications
                    </label>

                    <input type="checkbox" id="notif-modal" class="peer hidden" />

                    <div class="fixed inset-0 bg-black/40 hidden peer-checked:flex justify-center items-center z-50">
                    
                    <div class="bg-white w-96 max-h-[80vh] rounded-2xl p-5 overflow-y-auto shadow-lg flex flex-col gap-4 relative">
                        <label for="notif-modal" class="absolute top-3 right-4 text-gray-400 hover:text-black cursor-pointer text-xl">&times;</label>
                        <h2 class="titre text-lg font-semibold text-gray-800">Notifications</h2>

                        <div class="border border-gray-200 rounded-lg p-3">
                            <h3 class="titre text-sm font-semibold text-gray-800">Demande d’aide reçue</h3>
                            <p class="paragraphe text-sm text-gray-600">Joel a demandé ton aide en Design UX/UI.</p>
                            <p class="text-xs text-gray-400 mt-1">Il y a 10 min</p>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3">
                            <h3 class="titre text-sm font-semibold text-gray-800">Nouvelle connexion</h3>
                            <p class="paragraphe text-sm text-gray-600">Connexion réussie depuis un nouvel appareil.</p>
                            <p class="text-xs text-gray-400 mt-1">Il y a 1h</p>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3">
                            <h3 class="titre text-sm font-semibold text-gray-800">Mise à jour du profil</h3>
                            <p class="paragraphe text-sm text-gray-600">Ton profil a été mis à jour avec succès.</p>
                            <p class="text-xs text-gray-400 mt-1">Hier</p>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3">
                            <h3 class="titre text-sm font-semibold text-gray-800">Nouvelle compétence ajoutée</h3>
                            <p class="paragraphe text-sm text-gray-600">Tu as ajouté “Développement Front-End” à ton profil.</p>
                            <p class="text-xs text-gray-400 mt-1">Il y a 2 jours</p>
                        </div>
                    </div>
                    </div>

                </div>

                <!-- MESSAGERIE -->
                <div id="section6" class="w-full h-full bg-black rounded-lg p-4 flex flex-col text-white hidden">

                    <!-- En-tête -->
                    <div class="flex justify-between items-center mb-4 border-b border-white/20 pb-2">
                        <h2 class="titre text-lg font-semibold">Messagerie</h2>
                        <button class="bg-white text-black px-3 py-1 rounded-lg hover:bg-[#3396D3] hover:text-white transition paragraphe">
                        Nouveau message
                        </button>
                    </div>

                    <!-- Contenu principal -->
                    <div class="flex flex-1 gap-4">

                        <!-- Liste des conversations -->
                        <div class="w-1/3 bg-white/10 rounded-lg overflow-y-auto hide-scrollbar p-2 flex flex-col gap-2">
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                            <span class="w-10 h-10 bg-white/20 rounded-lg"></span>
                            <div>
                            <h3 class="titre text-sm font-semibold">Afi Kodjo</h3>
                            <p class="paragraphe text-xs text-gray-300 truncate w-40">Salut, tu peux m’aider sur mon site ?</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                            <span class="w-10 h-10 bg-white/20 rounded-lg"></span>
                            <div>
                            <h3 class="titre text-sm font-semibold">Jean-Paul K.</h3>
                            <p class="paragraphe text-xs text-gray-300 truncate w-40">Merci pour l’aide d’hier !</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                            <span class="w-10 h-10 bg-white/20 rounded-lg"></span>
                            <div>
                            <h3 class="titre text-sm font-semibold">Mariam A.</h3>
                            <p class="paragraphe text-xs text-gray-300 truncate w-40">Je veux apprendre React</p>
                            </div>
                        </div>
                        </div>

                        <!-- Fenêtre de discussion -->
                        <div class="flex-1 bg-white/10 rounded-lg flex flex-col justify-between p-4">

                        <!-- Zone de messages -->
                        <div class="flex flex-col gap-3 overflow-y-auto hide-scrollbar h-[60vh]">
                            <div class="self-start bg-white/20 rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm">Salut Joel, disponible ce soir pour discuter ?</p>
                            <p class="text-[10px] text-gray-300 mt-1">18:42</p>
                            </div>

                            <div class="self-end bg-[#3396D3] rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm">Oui bien sûr, à 19h ça te va ?</p>
                            <p class="text-[10px] text-gray-200 mt-1">18:45</p>
                            </div>

                            <div class="self-start bg-white/20 rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm">Parfait !</p>
                            <p class="text-[10px] text-gray-300 mt-1">18:46</p>
                            </div>
                        </div>
                        <!-- Champ d’envoi -->
                        <div class="flex items-center gap-3 mt-3">
                            <input type="text" placeholder="Écrire un message..."
                            class="flex-1 bg-white/20 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#3396D3] placeholder-gray-400 text-white" />
                            <button class="bg-[#3396D3] px-4 py-2 rounded-lg text-sm font-medium hover:bg-white hover:text-black transition">
                            Envoyer
                            </button>
                        </div>
                        </div>
                    </div>
                    
                </div>

                <!-- ALERTES -->
                <div id="section7" class="w-full h-full bg-black/10 rounded-lg relative hidden">
                    <div class="absolute top-6 left-1/2 transform -translate-x-1/2 bg-white text-black shadow-lg rounded-xl px-6 py-3 w-fit max-w-md flex items-center gap-3 animate-bounce">
                        <span class="w-8 h-8 flex justify-center items-center bg-[#3396D3] text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22a10 10 0 1 1 0-20a10 10 0 0 1 0 20m0-11.41l-4.3 4.3l1.41 1.41L12 12.41l2.89 2.89l1.41-1.41z"/></svg>
                        </span>
                        <p class="paragraphe text-sm font-medium">
                        💬 Nouveau message reçu de <span class="font-semibold">Afi Kodjo</span> : “Salut, tu es dispo ?”
                        </p>
                    </div>
                </div>

                <!-- ALERTES -->
                <div id="section8" class="w-full h-full bg-black/10 rounded-lg relative flex justify-center hidden">

                    <!-- <div class="absolute top-6 left-1/2 -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-fit max-w-md ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12.5L11 14.5L15 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="9" stroke="white" stroke-width="2"/>
                        </svg>
                        <p class="text-sm font-medium paragraphe">Modification réussie !</p>
                    </div> -->

                    
                    <!-- <div class="absolute top-6 left-1/2 -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-fit max-w-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none">
                        <path d="M12 9v4m0 4h.01M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-sm font-medium paragraphe">Connexion échouée. Vérifiez vos identifiants.</p>
                    </div> -->
                

                    <!-- <div class="absolute top-6 left-1/2 -translate-x-1/2 bg-yellow-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-fit max-w-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8h.01M12 12v4m0 6a9 9 0 1 1 0-18a9 9 0 0 1 0 18Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-sm font-medium">Vous avez été déconnecté automatiquement.</p>
                    </div> -->

                </div>

            </div>

        </section>
    </main>
    <script src="../js/resize.js"></script>
</body>
</html>