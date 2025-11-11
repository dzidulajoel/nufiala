<?php
    require_once('../config/auth.php');
    require_once('../scripts/admin_read.php');
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
            /* IE et Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }
    </style>
</head>

<body class="w-full h-screen flex flex-col relative">

    <nav id="navbar" class="w-[45vw] md:w-[30vw] lg:w-[12vw] h-[70vh] lg:h-full bg-white py-6 px-4 absolute rounded-tr-2xl rounded-br-2xl flex flex-col justify-start items left-0 top-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-50">

        <div class="flex justify-start items-center gap-4">

            <button id="hide" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20 resizeBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                    <path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z" />
                </svg>
            </button>

            <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                    <path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z" />
                </svg>
                <span class="text-xl font-semibold titre">Nufiala</span>
            </a>

        </div>

        <div id="menu" class="flex flex-col justify-between items-start h-full py-8 lien_conteneur transition-all duration-500 ease-in-out px-4">

            <ul class="w-full flex flex-col gap-2">

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section1" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3z" />
                        </svg>
                        <span class="lien">Dashboard</span>
                    </a>
                </li>
            </ul>

            <ul class="flex flex-col gap-2">

                <!-- <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section4" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" d="M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5" />
                            <path fill="#000" fill-rule="evenodd" d="M12.68 2.806a1.4 1.4 0 0 0-1.36 0l-7.2 4A1.4 1.4 0 0 0 3.4 8.03v7.94c0 .509.276.977.72 1.224l7.2 4a1.4 1.4 0 0 0 1.36 0l7.2-4a1.4 1.4 0 0 0 .72-1.223V8.03a1.4 1.4 0 0 0-.72-1.224zM7.25 12a4.75 4.75 0 1 1 9.5 0a4.75 4.75 0 0 1-9.5 0" clip-rule="evenodd" />
                        </svg>
                        <span class="lien">Paramètres</span>
                    </a>
                </li> -->

                <li class="paragraphe text-md text-justify h-8">
                    <button class="cursor-pointer px-4 flex justify-start items-center gap-2 deconnexion h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48">
                            <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                <path d="M23.9917 6H6V42H24" />
                                <path d="M33 33L42 24L33 15" />
                                <path d="M16 23.9917H42" />
                            </g>
                        </svg>
                        <span class="lien">Déconnexion</span>
                    </button>
                </li>

            </ul>

        </div>

    </nav>

    <main id="sections" class="h-screen w-full flex flex-col justify-between bg-black/10">
        <!-- HEADERSEARCH  -->
        <div class="w-full h-[8vh] px-4 py-3 flex justify-between items-center ">

            <div class="w-20 lg:w-[13vw] h-full flex justify-start items-center gap-4">
                <button id="show" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="#000" d="M3 4h18v2H3zm0 7h12v2H3zm0 7h18v2H3z" />
                    </svg>
                </button>
                <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z" />
                    </svg>
                    <span class="text-xl font-semibold titre">Nufiala</span>
                </a>
            </div>


            <div class="w-auto lg:w-[12vw] h-full flex justify-end items-center gap-2">

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


        <!-- ACCUEIL -->
        <section id="section1" class="section w-full h-auto lg:h-full rounded-lg flex flex-col  gap-4 px-6 ">
            <div>
                <h2 class="text-lg font-bold text-gray-800 mb-4 titre">Tableau de bord</h2>
            </div>

            <div class="w-full h-auto grid grid-cols-1  lg:grid-cols-3 gap-6">

                <div class="bg-[#3B82F6]/80 w-full h-[20vh] rounded-lg">
                    <div class="flex justify-between items-center p-4">
                        <span class="paragraphe text-white ">Nombre d'utilisateur</span>
                        <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                            </svg></span>
                    </div>
                    <div class="text-white flex justify-center items-center mt-8 text-2xl"><?= htmlspecialchars($totaux['total_utilisateurs']) ?></div>
                </div>

                <div class="bg-[#EF4444]/80 w-full h-[20vh] rounded-lg">
                    <div class="flex justify-between items-center p-4">
                        <span class="paragraphe text-white ">Nombre de Post</span>
                        <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                            </svg></span>
                    </div>
                    <div class="text-white flex justify-center items-center mt-8 text-2xl pointDepense"><?= htmlspecialchars($totaux['total_posts']) ?></div>
                </div>

                <div class="bg-[#22C55E]/80 w-full h-[20vh] rounded-lg">
                    <div class="flex justify-between items-center p-4">
                        <span class="paragraphe text-white ">Compétences échangées</span>
                        <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                            </svg></span>
                    </div>
                    <div class="text-white flex justify-center items-center mt-8 text-2xl pointGagne"><?= htmlspecialchars($totaux['total_invitations_acceptees']) ?></div>
                </div>

            </div>

            <div class="bg-black/10 w-full h-200 lg:h-[62vh] rounded-lg overflow-y-scroll no-scrollbar">

                <ul class="w-full flex justify-between items-center paragraphe bg-black p-4 text-white rounded-tr-lg rounded-tl-lg">
                    <li class="w-1/3 lg:w-1/6 px-2 border-r border-gray-300">Nom & Prenom</li>
                    <li class="w-1/6 px-2 border-r border-gray-300 hidden lg:flex">Domaine</li>
                    <li class="w-1/6 px-2 border-r border-gray-300 hidden lg:flex">Email</li>
                    <li class="w-1/3 lg:w-1/9 px-2 border-r border-gray-300 text-center">Pays</li>
                    <li class="w-1/9 px-2 border-r border-gray-300 text-center hidden lg:flex">Notation</li>
                    <li class="w-1/9 px-2 border-r border-gray-300 text-center hidden lg:flex">Points</li>
                    <li class="w-1/3 lg:w-1/6 px-2 "><button>Action</button></li>
                </ul>

                <div class="w-full flex flex-col gap-2 p-2">
                    <?php if (!empty($utilisateurs)) : ?>

                        <?php foreach ($utilisateurs as $utilisateur) : ?>

                            <ul class="w-full flex justify-between items-center paragraphe bg-white p-4 text-black">

                                <li class="w-1/3 lg:w-1/6 px-2 border-r border-gray-300"><?= htmlspecialchars($utilisateur['nom'] ?? "-")."". htmlspecialchars($utilisateur['prenom'])?></li>
                                <li class="w-1/6 px-2 border-r border-gray-300 hidden lg:flex"><?= htmlspecialchars($utilisateur['Domaine_principal'] ?? "-")?></li>
                                <li class="w-1/6 px-2 border-r border-gray-300 hidden lg:flex"><?= htmlspecialchars($utilisateur['email'] ?? "-")?></li>
                                <li class="w-1/3 lg:w-1/9 px-2 border-r border-gray-300 text-center"><?= htmlspecialchars($utilisateur['localisation'] ?? "-")?></li>
                                <li class="w-1/9 px-2 border-r border-gray-300 text-center hidden lg:flex"><?= htmlspecialchars($utilisateur['note_moyenne'] ?? "-")?></li>
                                <li class="w-1/9 px-2 border-r border-gray-300 text-center hidden lg:flex"><?= htmlspecialchars($utilisateur['points'] ?? "-")?></li>
                                <li class="w-1/3 lg:w-1/6 px-2 flex gap-3">

                                    <!-- BUTTON VOIR -->
                                    <button data-accepter = "<?= htmlspecialchars($utilisateur['id']) ?>" class="cursor-pointer btnView w-12 h-8 rounded-lg flex justify-center bg-green-500 items-center hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                            <g fill="none" stroke="#fff" stroke-width="2">
                                                <circle cx="12" cy="12" r="3" />
                                                <path d="M21 12s-1-8-9-8s-9 8-9 8" />
                                            </g>
                                        </svg>
                                    </button>

                                    <!-- BUTTON MODIFIER -->
                                    <!-- <button data-refuser = "<?= htmlspecialchars($utilisateur['id']) ?>" class="cursor-pointer btn_refuser w-12 h-8 rounded-lg flex justify-center bg-[#3B82F6] items-center hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 512 512"><defs><path id="SVGkrQfddLX" fill="#fff" d="M426.667 373.333V416H0v-42.667zM186.019 91.314l96 95.999l-143.352 143.354h-96v-96zM277.333 0l96 96l-68.686 68.686l-96-96z"/></defs><use fill-rule="evenodd" href="#SVGkrQfddLX" transform="translate(42.667 53.333)"/></svg>
                                    </button> -->

                                    <!-- BUTTON REFUSER -->
                                    <button data-refuser = "<?= htmlspecialchars($utilisateur['id']) ?>" class="cursor-pointer btn_supprimer w-12 h-8 rounded-lg flex justify-center bg-red-500 items-center hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 20 20"><path fill="#fff" d="M17 2h-3.5l-1-1h-5l-1 1H3v2h14zM4 17a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5H4z"/></svg>
                                    </button>

                                </li>
                            </ul>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <div class="w-full flex justify-center py-4 items-center paragraphe">
                            <p class="text-center">Aucun utilisateur</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        </section>

                <!-- MODAL MORE -->
         <div id="modalsvoirplus" class="fixed hidden inset-0 bg-black/50 flex justify-center items-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-[40vw] p-4 relative overflow-y-auto flex flex-col">
                <!-- Close button -->
                <button id="closeModalVue" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">✕</button>
                <h2 class="text-lg font-bold text-gray-800 mb-4 titre">Détails sur le posts</h2>
                <div class="detailsContainer">

                </div>
            </div>
         </div>
    </main>

    <script src="../js/resize.js"></script>
    <script src="../js/switch.js"></script>
    <script src="../js/admin_delete.js"></script>
    <script src="../js/admin_vue.js"></script>
    <script src="../js/deconnexion.js"></script>



</body>