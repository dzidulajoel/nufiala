<?php
    require_once('../config/auth.php');
    require_once('../scripts/read.php');
    require_once('../scripts/proposition.php');
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .titre {
            font-family: 'General Sans', sans-serif;
        }

        .sous_titre {
            font-family: 'Melodrama', serif;
        }

        .paragraphe,
        option {
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

        option {
            font-size: 1rem;
        }

        @keyframes pulse-like {
            0% { transform: scale(1); }
            50% { transform: scale(1.4); }
            100% { transform: scale(1); }
        }

        .animate-like {
            animation: pulse-like 0.3s ease-in-out;
        }

        .star {
            color: #ccc; /* étoile vide */
            transition: color 0.2s;
        }

        .star.active,
        .star:hover,
        .star:hover ~ .star {
            color: gold; /* étoile remplie */
        }

    </style>

</head>

<body class="w-full h-screen flex flex-col relative">

    <!-- NAVBAR -->
    <nav id="navbar" class="w-[45vw] md:w-[30vw] lg:w-[12vw] h-full bg-white py-6 px-4 absolute rounded-tr-2xl rounded-br-2xl flex flex-col justify-start items left-0 top-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-50">

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
                <span class="text-xl font-semibold titre hidden lg:flex">Nufiala</span>
            </a>

        </div>

        <div id="menu" class="flex flex-col justify-between items-start h-full py-8 lien_conteneur transition-all duration-500 ease-in-out px-4">

            <ul class="w-full flex flex-col gap-2">

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section1" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3z" />
                        </svg>
                        <span class="lien">Accueil</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify h-8">
                    <a href="explorer" data-section="section2" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m-1.396-11.396l-2.957 5.749l5.75-2.957l2.956-5.749l-5.75 2.957z" />
                        </svg>
                        <span class="lien">Explorer</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section3" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2" />
                        </svg>
                        <span class="lien">Échanges</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section6" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M14 14.252V22H4a8 8 0 0 1 10-7.748M12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6m6 4v-3h2v3h3v2h-3v3h-2v-3h-3v-2z"/></svg>
                        <span class="lien">Invitations</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section8" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4zm-8 4V3h18v18z"/></svg>
                        <span class="lien">Abonnements</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section7" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48"><path fill="#000" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M7 8h6v24H7zm14 0h6v32h-6zm14 0h6v18h-6z"/></svg>
                        <span class="lien">Activités</span>
                    </a>
                </li>

            </ul>

            <ul class="flex flex-col gap-2">

                <li class="paragraphe text-md text-justify h-8">
                    <a href="#" data-section="section4" class="px-4 flex justify-start items-center gap-2 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="#000" d="M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5" />
                            <path fill="#000" fill-rule="evenodd" d="M12.68 2.806a1.4 1.4 0 0 0-1.36 0l-7.2 4A1.4 1.4 0 0 0 3.4 8.03v7.94c0 .509.276.977.72 1.224l7.2 4a1.4 1.4 0 0 0 1.36 0l7.2-4a1.4 1.4 0 0 0 .72-1.223V8.03a1.4 1.4 0 0 0-.72-1.224zM7.25 12a4.75 4.75 0 1 1 9.5 0a4.75 4.75 0 0 1-9.5 0" clip-rule="evenodd" />
                        </svg>
                        <span class="lien">Paramètres</span>
                    </a>
                </li>

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

    <main id="sections" class="h-auto py-4 lg:py-0 lg:h-screen w-full flex flex-col justify-between bg-black/10">

        <!-- HEADERSEARCH  -->
        <div class="w-full h-[8vh] px-4 py-3 flex justify-between items-center ">

            <div class=" w-20 lg:w-[13vw] h-full flex justify-start items-center gap-2 lg:gap-4">

                <button id="show" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="#000" d="M3 4h18v2H3zm0 7h12v2H3zm0 7h18v2H3z" />
                    </svg>
                </button>

                <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z" />
                    </svg>
                    <span class="text-xl font-semibold titre hidden lg:flex">Nufiala</span>
                </a>

            </div>

            <!-- <div class="w-[75vw] h-full bg-white flex justify-end items-center px-4 rounded-tl-lg rounded-bl-lg"> -->
            <div class="hidden lg:flex w-[75vw] h-full flex justify-end items-center px-4 rounded-tl-lg rounded-bl-lg">

                <span class="w-14 h-full flex justify-center items-center bg-white rounded-tl-lg rounded-bl-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M10 4a6 6 0 1 0 0 12a6 6 0 0 0 0-12m-8 6a8 8 0 1 1 14.32 4.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387A8 8 0 0 1 2 10" />
                    </svg>
                </span>

                <form class="h-full flex justify-start items-center bg-white" id="recherche_par_nom_form">
                    <input type="text" name="nom" id="nom_de_la_recherhe" placeholder="Entrer un nom ..." class="px-4 h-full border-none outline-none paragraphe w-100" />

                    <!-- <div class="flex justify-start items-center h-full border-l border-gray-300">
                        <span class="w-8 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="#000" d="M11 2.535A4 4 0 0 0 5 6v1.774c-.851.342-1.549.874-2.059 1.575C2.292 10.242 2 11.335 2 12.5c0 1.561.795 2.936 2 3.742V17.5a4.5 4.5 0 0 0 7 3.742V17.5c0-1.333-.33-2.185-.86-2.76c-.543-.587-1.424-1.024-2.804-1.254l.328-1.972c1.302.216 2.442.623 3.336 1.313zm2 0v10.292c.894-.69 2.034-1.097 3.336-1.313l.328 1.972c-1.38.23-2.261.667-2.804 1.255c-.53.574-.86 1.426-.86 2.759v3.742a4.5 4.5 0 0 0 7-3.742v-1.258c1.205-.806 2-2.18 2-3.742c0-1.165-.292-2.258-.941-3.15c-.51-.702-1.208-1.234-2.059-1.576V6a4 4 0 0 0-6-3.465" />
                            </svg>
                        </span>
                        <input type="text" name="nom" placeholder="Compétence ..." class="px-4 h-full border-none outline-none paragraphe w-100" />
                    </div>

                    <div class="flex justify-start items-center h-full border-l border-gray-300">
                        <span class="w-8 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                    <path fill="#000" d="M12 2a9 9 0 0 1 9 9c0 3.074-1.676 5.59-3.442 7.395a20.4 20.4 0 0 1-2.876 2.416l-.426.29l-.2.133l-.377.24l-.336.205l-.416.242a1.87 1.87 0 0 1-1.854 0l-.416-.242l-.52-.32l-.192-.125l-.41-.273a20.6 20.6 0 0 1-3.093-2.566C4.676 16.589 3 14.074 3 11a9 9 0 0 1 9-9m0 2a7 7 0 0 0-7 7c0 2.322 1.272 4.36 2.871 5.996a18 18 0 0 0 2.222 1.91l.458.326q.222.155.427.288l.39.25l.343.209l.289.169l.455-.269l.367-.23q.293-.186.627-.417l.458-.326a18 18 0 0 0 2.222-1.91C17.728 15.361 19 13.322 19 11a7 7 0 0 0-7-7m0 3a4 4 0 1 1 0 8a4 4 0 0 1 0-8m0 2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                                </g>
                            </svg>
                        </span>
                        <input type="text" name="nom" placeholder="Domaine ..." class="px-4 h-full border-none outline-none paragraphe w-100" />
                    </div> -->

                    <button type="submit" class="w-40 bg-black h-full text-white paragraphe transition cursor-pointer rounded-tr-lg rounded-br-lg">Rechercher</button>
                </form>

            </div>

            <div class="w-auto lg:w-[12vw] h-full flex justify-end items-center gap-2">

                <div id="envoie_de_point" class="w-18 h-8 rounded-lg flex justify-center items-center gap-1 cursor-pointer bg-black/10 hover:bg-black/20 paragraphe text-md ">
                    <span class="affichage_point"><?= htmlspecialchars($data_utilisateur['points']) ?? "" ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 15 15"><path fill="#3B82F6" d="M11.783 0H3.217L.07 5.243a.5.5 0 0 0 .034.564l7 9a.5.5 0 0 0 .79 0l7-9a.5.5 0 0 0 .034-.564z"/></svg>
                </div>

                <div id="notif-btn" class="notif_button w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.268 21a2 2 0 0 0 3.464 0m-10.47-5.674A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                    </svg>
                    <span id="notif_info" class="w-5 h-5 cursor-pointer absolute top-0 right-[7px] bg-red-500 flex justify-center items-center rounded-full text-white text-[.5rem] font-semibold"><?php echo htmlspecialchars($nb_non_lues); ?></span>
                </div>

                <span class="deconnexion w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20 hidden lg:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <g fill="#000">
                            <path fill-rule="evenodd" d="M11 20a1 1 0 0 0-1-1H5V5h5a1 1 0 1 0 0-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h5a1 1 0 0 0 1-1" clip-rule="evenodd" />
                            <path d="M21.714 12.7a1 1 0 0 0 .286-.697v-.006a1 1 0 0 0-.293-.704l-4-4a1 1 0 1 0-1.414 1.414L18.586 11H9a1 1 0 1 0 0 2h9.586l-2.293 2.293a1 1 0 0 0 1.414 1.414l4-4z" />
                        </g>
                    </svg>
                </span>
                
            </div>

        </div>

        <!-- EXPLORER -->
        <section id="section2" class="section w-full hidden h-[92vh] flex justify-between items-center py-4 px-8 hidden">

            <!-- filtrage form -->
            <div class="hidden lg:flex lg:w-[20vw] h-full overflow-y-auto bg-white rounded-lg py-4">
                <section class="w-full h-full mx-auto px-2">

                    <form id="faq" class="space-y-1 form_filtrage">

                        <!-- categories-->
                        <div class="w-full rounded-lg">

                            <button class="faq-toggle w-full flex justify-between items-center px-5 py-2 text-left">
                                <span class="paragraphe text-md text-start font-semibold">Domaine de compétence</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white paragraphe text-md text-start space-y-3">
                                
                                <?php 
                                    foreach ($domaines as $index => $domaine): 
                                    $count = $categoriesCount[$domaine] ?? 0;
                                    $id = str_replace(' ', '_', $domaine);
                                ?>

                                    <div class="w-full flex justify-between items-center">
                                        <div class="space-x-2 flex items-center">
                                            <input type="checkbox" id="<?= htmlspecialchars($id) ?>" name="domaine[]" value="<?= htmlspecialchars($domaine) ?>" class="accent-black">
                                            <label for="<?= htmlspecialchars($id) ?>" class="paragraphe text-black text-md"><?= htmlspecialchars($domaine) ?></label>
                                        </div>
                                        <span class="paragraphe text-black text-md bg-black/10 px-2 rounded-lg"><?= htmlspecialchars($count) ?></span>
                                    </div>

                                <?php endforeach; ?>
                            </div>

                        </div>

                        <!-- Niveau de compétence -->
                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center px-5 py-2 text-left">
                                <span class="paragraphe text-md text-start font-semibold">Niveau de compétence</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">

                                <?php 
                                    foreach ($niveaux as $n):  
                                    $count_n = $niveauCount[$n] ?? 0;
                                    $id = str_replace(' ', '_', $n);
                                ?>
                                    <div class="w-full flex justify-between items-center">
                                        <div class="space-x-1">
                                            <input type="checkbox" name="<?= htmlspecialchars($n) ?>" value="<?= htmlspecialchars($n) ?>" id="<?= htmlspecialchars($id) ?>" class="accent-black">
                                            <label class="paragraphe text-black text-md" for="<?= htmlspecialchars($n) ?>"><?= htmlspecialchars($n) ?></label>
                                        </div>
                                        <span class="paragraphe text-black text-md bg-black/10 px-2 rounded-lg"><?= htmlspecialchars($count_n) ?></span>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                        </div>

                        <!-- Mode -->
                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center px-5 py-2 text-left">
                                <span class="paragraphe text-md text-start font-semibold">Type d’échange</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">
                                <?php 
                                    foreach ($modes as $mode) : 
                                    $count_m = $modeCounts[$mode] ?? 0; // récupère le compteur
                                    $id = str_replace(' ', '_', $mode);
                                ?>
                                    <div class="w-full flex justify-between items-center">
                                        <div class="space-x-1">
                                            <input type="checkbox" name="<?= htmlspecialchars($id) ?>" value="<?= htmlspecialchars($mode) ?>" id="<?= htmlspecialchars($id) ?>" class="accent-black">
                                            <label class="paragraphe text-black text-md" for="<?= htmlspecialchars($id) ?>">
                                                <?= str_replace('_', ' ', htmlspecialchars($mode)) ?>
                                            </label>

                                        </div>
                                        <span class="paragraphe text-black text-md bg-black/10 px-2 rounded-lg"><?= htmlspecialchars($count_m) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Disponibilite -->
                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center px-5 py-2 text-left">
                                <span class="paragraphe text-md text-start font-semibold">Disponibilité</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white paragraphe text-md text-start space-y-2">
                                <?php foreach ($moments as $m) : 
                                    $count_m = $momentCounts[$m] ?? 0;
                                    $id = str_replace('-', '_', $m); // transforme "Après-midi" => "Après_midi" pour l'id
                                ?>
                                    <div class="w-full flex justify-between items-center">
                                        <div class="space-x-1">
                                            <input type="checkbox" name="<?= htmlspecialchars($id) ?>" value="<?= htmlspecialchars($m) ?>" id="<?= htmlspecialchars($id) ?>" class="accent-black">
                                            <label class="paragraphe text-black text-md" for="<?= htmlspecialchars($id) ?>"><?= htmlspecialchars($m) ?></label>
                                        </div>
                                        <span class="paragraphe text-black text-md bg-black/10 px-2 rounded-lg"><?= htmlspecialchars($count_m) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="w-full rounded-lg flex justify-start items-center gap-4 p-4">
                            <button id="btn_form_filtrage" type="submit" class="w-1/2 bg-black text-white px-4 py-2 rounded-md paragraphe cursor-pointer">Appliquer</button>
                            <span id="btn_filtrage_reset" class="w-1/2 bg-black/10 text-gray-800 px-4 py-2 rounded-md paragraphe text-black text-center cursor-pointer ">Réinitialiser</span>
                        </div>

                    </form>

                </section>
            </div>

            <!-- offres -->
            <div class="w-full lg:w-[80vw] h-full md:pl-4 space-y-4 overflow-y-scroll no-scrollbar">

                <div class="w-full h-8 flex justify-between items-center">
                    <h3 class="text-xl font-semibold paragraphe"> <span class="nombre_de_proposition"> <?= htmlspecialchars($total ?? "") ?> </span> Offres disponibles</h3>
                </div>

                <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-6 container">
                    <?php if($propositions):?>
                        <?php foreach ($propositions as $proposition): $isLiked = in_array($proposition['id'], $likedPosts); ?>

                            <div class="w-full h-90 bg-white rounded-lg p-4 space-y-1">

                                <div class="w-full h-20 flex justify-start items-start gap-2">

                                    <div class="h-16 w-16 bg-black rounded-lg flex justify-center items-center relative">

                                        <?php
                                            $nom = strtoupper(substr($proposition['nom'], 0, 1));
                                            $prenom = strtoupper(substr($proposition['prenom'], 0, 1));
                                            $hash = md5($nom.$nom.$prenom);
                                            $color = '#' . substr($hash, 0, 6);
                                            $id_createur = $proposition['id_utilisateur'];
                                            $sql = "SELECT  nom, prenom  FROM utilisateurs  WHERE id = :id";
                                            $req = $pdo->prepare($sql);
                                            $req->execute(array(
                                                ":id" => $id_createur
                                            ));
                                            $famille = $req->fetch(PDO::FETCH_ASSOC);
                                        ?>

                                        <span style="color: <?= $color ?>;" class="font-bold text-2xl">
                                            <?= strtoupper(htmlspecialchars(
                                                mb_substr($famille['nom'] ?? '', 0, 1) .
                                                    mb_substr($famille['prenom'] ?? '', 0, 1)
                                            )) ?: 'N/A' ?>
                                        </span>
                                    
                                        <!-- SUIVRE BUTTON -->
                                        <?php 
                                            $id_session = $_SESSION['id_utilisateur'];
                                            $id_proprietaire = $proposition['id_utilisateur'];

                                            // Vérifier si une relation d'abonnement existe dans un sens ou dans l'autre
                                            $sql = "SELECT 1 FROM abonnements 
                                                    WHERE abonner_verifie = 1
                                                    AND (
                                                        (id_suiveur = :id_session AND id_suivi = :id_proprietaire)
                                                        OR
                                                        (id_suiveur = :id_proprietaire AND id_suivi = :id_session)
                                                    )
                                                    LIMIT 1";

                                            $req = $pdo->prepare($sql);
                                            $req->execute([
                                                ':id_session' => $id_session,
                                                ':id_proprietaire' => $id_proprietaire
                                            ]);

                                            $est_abonne = $req->fetchColumn();
                                        ?>

                                        <?php if ($id_proprietaire === $id_session): ?>
                                                <!-- Rien : l'utilisateur ne peut pas se suivre lui-même -->
                                        <?php else: ?>
                                            <?php if($est_abonne): ?>
                                                <!-- ✅ Déjà abonné -->
                                                <button data-follow="<?= htmlspecialchars($id_proprietaire) ?>" 
                                                        type="button" 
                                                        class="follow_btn w-5 h-5 cursor-pointer absolute bottom-0 right-0 bg-green-500 transition flex justify-center items-center rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                        <path fill="#fff" fill-rule="evenodd" d="m6 10l-2 2l6 6L20 8l-2-2l-8 8z"/>
                                                    </svg>
                                                </button>

                                            <?php else: ?>
                                                <!-- ➕ Bouton pour s’abonner -->
                                                <button data-follow="<?= htmlspecialchars($id_proprietaire) ?>" 
                                                        type="button" 
                                                        class="follow_btn w-5 h-5 cursor-pointer absolute bottom-0 right-0 bg-[#3B82F6] transition flex justify-center items-center rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M12 19V5m7 7H5"/>
                                                    </svg>
                                                </button>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                    </div>

                                    <div>
                                        <h2 class="text-sm font-semibold titre"><?= htmlspecialchars($proposition['nom'] ?? "")." ".htmlspecialchars($proposition['prenom'] ?? "") ?></h2>
                                        
                                        <div class="w-full h-6 flex justify-start items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                <path fill="#000" d="M12 2c-4.4 0-8 3.6-8 8c0 5.4 7 11.5 7.3 11.8c.2.1.5.2.7.2s.5-.1.7-.2C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8m0 17.7c-2.1-2-6-6.3-6-9.7c0-3.3 2.7-6 6-6s6 2.7 6 6s-3.9 7.7-6 9.7M12 6c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2" />
                                            </svg>
                                            <span class="text-black paragraphe text-md font-medium"><?= htmlspecialchars($proposition['Lieu_proposition'] ?? "") ?></span>
                                        </div>
                                    </div>

                                    <div class="ml-auto">
                                        <span class="w-full h-20 text-gray-500 paragraphe text-sm ">
                                            <?= !empty($proposition['created_at']) ? date('d M. Y', strtotime($proposition['created_at'])) : '' ?>
                                        </span>
                                    </div>

                                </div>
                                
                                <div class="w-full h-6 flex justify-start items-center gap-1">
                                    <h2 class="text-md font-semibold titre text-gray-500"><?= htmlspecialchars($proposition['Titre_de_la_competence'] ?? "") ?></h2>
                                </div>

                                <div class="w-full h-8 flex justify-between items-center">

                                    <div class="paragraphe rounded-lg"><?= htmlspecialchars($proposition['niveau_propose'] ?? "") ?></div>

                                    <div class="paragraphe rounded-lg flex justify-center items-center">
                                        <span><?= htmlspecialchars($proposition['note_moyenne'] ?? "") ?></span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                                <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="paragraphe rounded-lg flex justify-center items-center">

                                        <span><?= htmlspecialchars($proposition['point'] ?? "") ?> pts</span>
                                        <?php if ($proposition['type'] === 'recherche'): ?>
                                            <!-- Icône pour recherche -->

                                            <span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                    <g fill="none">
                                                        <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.105.074l.014.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.092l.01-.009l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="#EF4444" d="M18 5a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V8.414l-9.95 9.95a1 1 0 0 1-1.414-1.414L15.586 7H10a1 1 0 1 1 0-2z" />
                                                    </g>
                                                </svg>
                                            </span>

                                        <?php else: ?>

                                            <!-- Icône pour proposition -->
                                            <span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="none" stroke="#22C55E" stroke-linecap="round" stroke-width="2" d="M17.657 6.343L6.343 17.657m0-8.485v8.485h8.485"/></svg>
                                            </span>

                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="w-full h-20 text-black paragraphe text-md "><?= htmlspecialchars(substr($proposition['description_proposition'] ?? "", 0, 170)) . (strlen($proposition['description_proposition'] ?? "") > 100 ? " ..." : "") ?></div>

                                <div class="w-full h-14 flex justify-start items-center gap-4">

                                    <?php if($proposition['Mode_d_echange_proposition'] === "En_ligne"): ?>
                                        <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">En ligne</span>
                                    <?php elseif($proposition['Mode_d_echange_proposition'] === "presentiel"): ?>
                                        <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">présentiel</span>
                                    <?php else: ?>
                                        <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">En ligne ou présentiel (si possible)</span>
                                    <?php endif ?>

                                    <?php if($proposition['type'] === "proposition"): ?>
                                        <span class="paragraphe bg-blue-600/20 px-4 py-1 rounded-lg text-sm">Proposition</span>
                                    <?php else: ?>
                                        <span class="paragraphe bg-green-600/20 px-4 py-1 rounded-lg text-sm">Recherche</span>
                                    <?php endif ?>

                                </div>

                                <!-- BUTTONS -->
                                <div class="w-full h-12 flex justify-between items-center">

                                    <div>
                                        <?php
                                            $check = $pdo->prepare("SELECT status FROM Invitations WHERE id_envoyeur = ? AND id_post = ?");
                                            $check->execute([$id_session, $proposition['id']]);
                                            $status = $check->fetchColumn(); // renvoie directement le statut
                                        ?>

                                        <?php if ($status === "en_attente"): ?>
                                            <button data-post_id ="<?= htmlspecialchars($proposition['id'])?>" data-invitation="<?= htmlspecialchars($id_createur)?>" data-recherche="recherche" class="btn_invivtation w-full cursor-pointer bg-black/50 text-white py-2 px-4 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">En attente de réponse</button>
                                        <?php elseif ($status === "acceptee"): ?>
                                            <button data-post_id ="<?= htmlspecialchars($proposition['id'])?>" data-invitation="<?= htmlspecialchars($id_createur)?>" data-recherche="recherche" class="btn_invivtation w-full cursor-pointer bg-green-500 text-white py-2 px-4 rounded-lg font-medium transition paragraphe">Vous êtes en discussion</button>
                                        <?php else: ?>
                                            <?php if ($proposition['type'] === 'recherche'): ?>
                                                <button data-post_id ="<?= htmlspecialchars($proposition['id'])?>" data-invitation="<?= htmlspecialchars($id_createur)?>" data-recherche="recherche" class="btn_invivtation w-full cursor-pointer bg-black text-white py-2 px-4 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Proposer mon aide</button>
                                            <?php else: ?>
                                                <button data-post_id ="<?= htmlspecialchars($proposition['id'])?>" data-invitation="<?= htmlspecialchars($id_createur)?>" data-proposition="proposition" class="btn_invivtation w-full cursor-pointer bg-black text-white py-2 px-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Demander cette compétence</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="flex justify-start items-center gap-1 lg:gap-3">

                                        <button data-like= "<?= htmlspecialchars($proposition['id'])?>" class="likeBtn w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20">
                                            <?php if($isLiked): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#DC2626" d="M20.205 4.791a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416"/></svg>
                                            <?php else : ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 4.595a5.9 5.9 0 0 0-3.996-1.558a5.94 5.94 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.94 5.94 0 0 0-4.209-1.754A5.9 5.9 0 0 0 12 4.595m6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584c.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a1 1 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002"/></svg>
                                            <?php endif ?>

                                        </button>

                                        <button data-vue = "<?= htmlspecialchars($proposition['id']) ?>" class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20 btnVuesPostes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="#000" stroke-width="2">
                                                    <circle cx="12" cy="12" r="3" />
                                                    <path d="M21 12s-1-8-9-8s-9 8-9 8" />
                                                </g>
                                            </svg>
                                        </button>

                                        <?php if ($proposition['type'] === 'recherche'): ?>

                                            <!-- Icône pour recherche -->
                                            <span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z"><animateTransform id="SVGKSLUAcIu" attributeName="transform" attributeType="XML" begin="0;SVGKjj5hd4q.end" dur="1s" from="-90 12 12" to="0 12 12" type="rotate"/><animateTransform id="SVGkFYRWcWj" attributeName="transform" attributeType="XML" begin="SVGKSLUAcIu.end" dur="1s" from="0 12 12" to="-90 12 12" type="rotate"/><animateTransform id="SVGKjj5hd4q" attributeName="transform" attributeType="XML" begin="SVGkFYRWcWj.end" dur="1s" from="-90 12 12" to="270 12 12" type="rotate"/></path></svg>
                                            </span>

                                        <?php else: ?>

                                            <!-- Icône pour proposition -->
                                            <span class="w-12 h-8 rounded-lg flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#EAB308" d="M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7M9 21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1H9z"/></svg>
                                            </span>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    <?php else:?>
                        <div class="w-full flex justify-center py-4 items-center paragraphe text-black">
                            <p class="text-center">Aucun pour l'instant</p>
                        </div>
                    <?php endif ?>

                </div>

                <div class="w-full h-8 flex justify-center items-center mt-4 pagination_container">
                    <div class="space-x-1">
                        <!-- Bouton Précédent -->
                        <?php if($page > 1): ?>
                            <a href="?page=<?= $page-1 ?>" class="h-8 px-4 py-2 bg-white paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Précédent</a>
                        <?php else: ?>
                            <button class="h-8 px-4 py-2 bg-gray-200 text-black paragraphe rounded-lg">Précédent</button>
                        <?php endif; ?>

                        <?php
                            // Déterminer la plage de pages à afficher autour de la page actuelle
                            $start = max(1, $page - 2);
                            $end = min($totalPages, $page + 2);

                            // Première page + "..."
                            if($start > 1) {
                                echo '<a href="?page=1" class="px-4 py-2 w-8 h-8 paragraphe bg-white text-black rounded-lg hover:bg-[#3396D3] transition">1</a>';
                                if($start > 2) echo '<span class="text-black">...</span>';
                            }

                            // Pages autour de la page actuelle
                            for($i = $start; $i <= $end; $i++):
                                $active = $i === $page ? 'bg-[#3396D3] text-black font-medium' : 'bg-white text-black hover:bg-[#3396D3] transition';
                        ?>
                            <a href="?page=<?= $i ?>" class="px-4 py-2 w-8 h-8 paragraphe rounded-lg <?= $active ?>"><?= $i ?></a>
                        <?php endfor; ?>

                        <?php
                            // Dernière page + "..."
                            if($end < $totalPages) {
                                if($end < $totalPages-1) echo '<span class="text-black">...</span>';
                                echo '<a href="?page='.$totalPages.'" class="px-4 py-2 w-8 h-8 paragraphe bg-white text-black rounded-lg hover:bg-[#3396D3] transition">'.$totalPages.'</a>';
                            }
                        ?>

                        <!-- Bouton Suivant -->
                        <?php if($page < $totalPages): ?>
                            <a href="?page=<?= $page+1 ?>" class="px-4 py-2 h-8 px-4 bg-white paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Suivant</a>
                        <?php else: ?>
                            <button class="h-8 px-4 bg-gray-200 text-black paragraphe rounded-lg">Suivant</button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </section>

        <!-- ACCUEIL -->
        <section id="section1" class="section w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 px-6 ">

            <div class="hidden lg:flex w-screen lg:w-[25vw] h-[30vh] lg:h-full rounded-lg flex justify-between gap-6 items-center flex-col bg-white p-4">

                <div class="w-full h-full flex flex-col justify-between">
                    
                    <div class="bg-black w-full rounded-lg h-[35%] flex justify-center items-center">
                        <div class="text-white text-[6rem] font-bold">
                            <?php
                                $nom = strtoupper(substr($proposition['nom'], 0, 1));
                                $hash = md5($nom);
                                $color = '#' . substr($hash, 0, 6);
                            ?>
                            <span style="color: <?= $color ?>;">
                                <?= strtoupper(htmlspecialchars(
                                    mb_substr($data_utilisateur['nom'] ?? '', 0, 1) .
                                        mb_substr($data_utilisateur['prenom'] ?? '', 0, 1)
                                )) ?: 'N/A' ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col justify-between h-[65%]">

                        <div class="flex flex-col justify-center items-center gap-2 py-8">
                            <h2 class="titre text-xl font-semibold"><?= strtoupper(htmlspecialchars(trim(($data_utilisateur['nom'] ?? '') . ' ' . ($data_utilisateur['prenom'] ?? '')))) ?: 'Non renseigné' ?></h2>
                            <p class="paragraphe font-medium"><span><?= htmlspecialchars($data_utilisateur['Domaine_principal']) ?? "" ?></span> • <span><?= htmlspecialchars($data_utilisateur['localisation']) ?? "" ?></span></p>
                        </div>

                        <div class="flex justify-center items-center gap-4">
                            <button class="w-full bg-black text-white py-2 rounded-lg font-medium paragraphe">
                                <?= htmlspecialchars($amis) ?? '' ?>
                                        ami<?= ($amis ?? 0) != 1 && 0 ? "s" : "" ?>
                            </button>
                            <div class="w-full flex justify-center items-center gap-2 bg-black/10 text-black py-2 rounded-lg font-medium paragraphe">
                                <span class="pointAccueil">
                                    <?= htmlspecialchars($data_utilisateur['points']) ?? "" ?>
                                    pt<?= ($data_utilisateur['points'] ?? 0) != 1 ? "s" : "" ?>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <?php
                            $bio = htmlspecialchars($data_utilisateur['bio'] ?? '');
                            if (strlen($bio) > 250) {
                                $bio_affiche = substr($bio, 0, 250) . ' ...';
                            } else {
                                $bio_affiche = $bio;
                        }
                        ?>
                        <p class="paragraphe text-start"><?= $bio_affiche ?></p>

                        <ul class="flex flex-col justify-center items-center gap-4">

                            <li class="w-full flex justify-between items-center paragraphe">
                                <span>Domaine principal</span>
                                <span><?= htmlspecialchars($data_utilisateur['Domaine_principal']) ?? "" ?></span>
                            </li>

                            <li class="w-full flex justify-between items-center paragraphe">
                                <span>Niveau</span>
                                <span><?= htmlspecialchars($data_utilisateur['niveau']) ?? "" ?></span>
                            </li>

                            <li class="w-full flex justify-between items-center paragraphe">
                                <span>Note</span>
                                <div class="flex justify-end items-center gap-1 ">
                                    <span><?= htmlspecialchars(number_format($moyenne, 2)) ?? "0.0" ?></span>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                            <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                                        </svg></span>
                                </div>
                            </li>

                        </ul>

                        <div class="flex flex-col justify-center items-center gap-4">
                            <button id="Proposer" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Proposer une compétence</button>
                            <button id="Chercher" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Chercher une compétence</button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="w-full lg:w-[75vw] h-full flex flex-col gap-4 p-4 bg-white rounded-lg">

                <div class="w-full h-auto grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="bg-[#3B82F6]/80 w-full h-[20vh] rounded-lg">
                        <div class="flex justify-between items-center p-4">
                            <span class="paragraphe text-white ">Total Point</span>
                            <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" /> </svg></span>
                        </div>
                        <div class="text-white flex justify-center items-center mt-8 text-2xl"><?= htmlspecialchars($data_utilisateur['points'] ?? "") ?></div>
                    </div>

                    <div class="bg-[#EF4444]/80 w-full h-[20vh] rounded-lg">
                        <div class="flex justify-between items-center p-4">
                            <span class="paragraphe text-white ">Total dépensé</span>
                            <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" /> </svg></span>
                        </div>
                        <div class="text-white flex justify-center items-center mt-8 text-2xl pointDepense"><?= $totalPerdu ?></div>
                    </div>

                    <div class="bg-[#22C55E]/80 w-full h-[20vh] rounded-lg">
                        <div class="flex justify-between items-center p-4">
                            <span class="paragraphe text-white ">Total gagné</span>
                            <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" /> </svg></span>
                        </div>
                        <div class="text-white flex justify-center items-center mt-8 text-2xl pointGagne"><?= $totalGagne ?></div>
                    </div>

                </div>

                <div class="w-full h-full rounded-lg py-3 lg:overflow-y-auto scrollbar-hide flex flex-col flex-col-reverse lg:flex-row justify-between items-center gap-4">

                    <div class="w-full lg:w-1/2 h-full mx-auto rounded-lg">
                        <h3 class="text-lg font-semibold mb-3">Statistiques des Posts</h3>
                        <canvas id="postsChart" class="w-full h-70 lg:h-full" style="height: 90%;"></canvas>
                    </div>

                    <div class="w-full lg:w-1/2 h-full mx-auto rounded-lg flex flex-col justify-end items-end gap-4">

                        <div class="bg-black w-full lg:w-[65%]  h-[20vh] rounded-lg">
                            <div class="flex justify-between items-center p-4">
                                <span class="paragraphe text-white ">Total like</span>
                                <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#EF4444" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z"/></svg>
                                </span>
                            </div>
                            <div class="text-white flex justify-center items-center mt-8 text-2xl"><?= (int)$total_likes ?></div>
                        </div>

                        <div class="bg-black w-full lg:w-[65%]  h-[20vh] rounded-lg">
                            <div class="flex justify-between items-center p-4">
                                <span class="paragraphe text-white ">Total Vu</span>
                                <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none" stroke="#3B82F6" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M21 12s-1-8-9-8s-9 8-9 8"/></g></svg>
                                </span>
                            </div>
                            <div class="text-white flex justify-center items-center mt-8 text-2xl"><?= (int)$total_vues ?></div>
                        </div>

                        <div class="bg-black w-full lg:w-[65%]  h-[20vh] rounded-lg">
                            <div class="flex justify-between items-center p-4">
                                <span class="paragraphe text-white ">Total echange </span>
                                <span class="w-10 h-10 rounded-md bg-white flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 15 15"><path fill="#22C55E" d="M5.5 0a3.499 3.499 0 1 0 0 6.996A3.499 3.499 0 1 0 5.5 0m-2 8.994a3.5 3.5 0 0 0-3.5 3.5v2.497h11v-2.497a3.5 3.5 0 0 0-3.5-3.5zm9 1.006H12v5h3v-2.5a2.5 2.5 0 0 0-2.5-2.5"/><path fill="#22C55E" d="M11.5 4a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5"/></svg>
                                </span>
                            </div>
                            <div class="text-white flex justify-center items-center mt-8 text-2xl"><?= (int)$total_invitations ?></div>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- PARAMETRES -->
        <section id="section4" class="section w-full h-auto lg:h-full rounded-lg hidden px-4 no-scrollbar overflow-y-scroll">
            <div id="msg_parametre"></div>
            <form class="w-full h-full flex flex-col lg:flex-row justify-center items-start lg:p-4 gap-4 no-scrollbar overflow-y-scroll" id="form_parametre">

                <div class="w-full lg:w-1/2 flex flex-col gap-8 bg-white p-4 h-auto rounded-lg">
                    
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

                        <div class="w-24 h-24 rounded-xl bg-black flex justify-center items-center text-white text-3xl font-bold">
                            <?php
                                $nom = strtoupper(substr($proposition['nom'], 0, 1));
                                $hash = md5($nom);
                                $color = '#' . substr($hash, 0, 6);
                            ?>
                            <span style="color: <?= $color ?>;">
                                <?= strtoupper(htmlspecialchars(
                                    mb_substr($data_utilisateur['nom'] ?? '', 0, 1) .
                                        mb_substr($data_utilisateur['prenom'] ?? '', 0, 1)
                                )) ?: 'N/A' ?>
                            </span>
                        </div>

                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="titre text-2xl font-bold text-gray-800"><?= htmlspecialchars(trim(($data_utilisateur['nom'] ?? '') . ' ' . ($data_utilisateur['prenom'] ?? ''))) ?: 'Non renseigné' ?></h1>
                            <p class="paragraphe text-gray-600"><?= htmlspecialchars($data_utilisateur['Domaine_principal']) ?? "" ?> • <?= htmlspecialchars($data_utilisateur['niveau']) ?? "" ?></p>
                            <p class="paragraphe text-gray-500 mt-1"><?= htmlspecialchars($data_utilisateur['localisation']) ?? "" ?> • Membre depuis <?= htmlspecialchars(ucfirst($formatter->format($date))) ?? "" ?></p>
                        </div>

                        <div class="flex flex-col justify-start gap-4">
                            <button id="Modifier_le_profil_btn" class="bg-black text-white px-5 py-2 rounded-lg hover:bg-[#3396D3] transition paragraphe">Modifier le profil</button>
                            <div class="flex justify-center items-center gap-2">
                                <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                    <span><?= htmlspecialchars(number_format($moyenne, 2)) ?? "0.0" ?></span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                            <path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77" />
                                        </svg>
                                    </span>
                                </div>

                                <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center gap-1">
                                    <span>
                                        <?= htmlspecialchars($data_utilisateur['points']) ?? "" ?>
                                        pt<?= ($data_utilisateur['points'] ?? 0) != 1 ? "s" : "" ?>
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                            <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="">
                        <h2 class="titre text-xl font-semibold mb-4 text-gray-800">Informations personnelles</h2>

                        <div class="space-y-4">
                            <div class="flex justify-start items-center gap-4">

                                <div class="w-1/2">
                                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom </label>
                                    <input id="nom" type="text" value="<?= htmlspecialchars(trim(($data_utilisateur['nom'] ?? ''))) ?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                </div>

                                <div class="w-1/2">
                                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Prenom</label>
                                    <input id="prenom" type="text" value="<?= htmlspecialchars(trim(($data_utilisateur['prenom'] ?? ''))) ?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                </div>

                            </div>

                            <div>
                                <label for="nom_utilisateur" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom d'utilisateur</label>
                                <input id="nom_utilisateur" type="text" value="<?= htmlspecialchars(trim(($pseudo ?? ''))) ?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Email</label>
                                <input id="email" type="email" value="<?= htmlspecialchars($data_utilisateur['email']) ?? "" ?> " disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            </div>

                            <div>
                                <label for="tel" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Téléphone</label>
                                <input id="tel" type="text" value="<?= htmlspecialchars($data_utilisateur['telephone']) ?? "" ?> " disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            </div>

                            <div>
                                <label for="genre" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Sexe</label>
                                <select id="genre" disabled class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                    <option value="Homme" <?= ($data_utilisateur['genre'] ?? '') === 'Homme' ? 'selected' : '' ?>>Homme</option>
                                    <option value="Femme" <?= ($data_utilisateur['genre'] ?? '') === 'Femme' ? 'selected' : '' ?>>Femme</option>
                                    <option value="Autre" <?= ($data_utilisateur['genre'] ?? '') === 'Autre' ? 'selected' : '' ?>>Autre</option>
                                </select>
                            </div>

                            <div>
                                <label for="date_de_naissance" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Date de naissance</label>
                                <input id="date_de_naissance" disabled type="date" value="<?= htmlspecialchars($data_utilisateur['date_de_naissance'] ?? '2000-01-01') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            </div>

                            <div>
                                <label for="localisation" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Pays / Localisation</label>
                                <input id="localisation" disabled type="text" value="<?= htmlspecialchars($data_utilisateur['localisation'] ?? '') ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            </div>

                            <div class="sm:col-span-2">
                                <textarea id="description_profil" rows="3" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe" placeholder="Parlez-nous un peu de vous..."><?= htmlspecialchars($data_utilisateur['bio'] ?? '') ?></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-8 bg-white p-4 h-full rounded-lg">

                    <div class="">

                        <h2 class="titre text-xl font-semibold mb-4 text-gray-800">Compétences & Disponibilités</h2>
                        <div class="space-y-8">

                            <div class="w-full">
                                <label for="domaine_principal" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Domaine principal</label>
                                <input id="domaine_principal" type="text" value="<?= htmlspecialchars($data_utilisateur['Domaine_principal'] ?? "") ?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            </div>

                            <div class="w-full">
                                <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau</label>
                                <select id="niveau" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    <option class="text-md paragraphe" value="debutant" <?= ($data_utilisateur['niveau'] ?? '') === 'debutant' ? 'selected' : '' ?>>Débutant</option>
                                    <option class="text-md paragraphe" value="intermediaire" value="intermediaire" <?= ($data_utilisateur['niveau'] ?? '') === 'intermediaire' ? 'selected' : '' ?>>Intermédiaire</option>
                                    <option class="text-md paragraphe" value="avance" value="avance" <?= ($data_utilisateur['niveau'] ?? '') === 'avance' ? 'selected' : '' ?>>Avancé</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <label for="disponibilite" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                                <input id="disponibilite" type="text" value="<?= htmlspecialchars($data_utilisateur['Disponibilite'] ?? "") ?>" placeholder="Lundi au jeudi (17h–20h)" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            </div>

                            <div class="w-full">
                                <label for="mode_d_echange" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">
                                    Mode d'échange
                                </label>
                                <select id="mode_d_echange" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    <option value="en_ligne" <?= ($data_utilisateur['mode_d_echange'] ?? '') === 'en_ligne' ? 'selected' : '' ?>>En ligne</option>
                                    <option value="presentiel" <?= ($data_utilisateur['mode_d_echange'] ?? '') === 'presentiel' ? 'selected' : '' ?>>Présentiel</option>
                                    <option value="les_deux" <?= ($data_utilisateur['mode_d_echange'] ?? '') === 'les_deux' ? 'selected' : '' ?>>En ligne ou présentiel (si possible)</option>
                                </select>
                            </div>

                            <div>
                                <label for="competences_principales" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Compétences principales (séparées par des tirets - )</label>
                                <input id="competences_principales" type="text" value="<?= ($data_utilisateur['Competences_principales'] ?? '') ?>" disabled class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            </div>

                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-27">
                        <h2 class="titre text-xl font-semibold text-gray-800">Paramètres du compte</h2>
                        <div class="w-full flex flex-col justify-start items-center gap-4 paragraphe">
                            <a href="../recuperation/" class="w-full text-center cursor-pointer bg-[#3396D3] text-white py-2 px-6 rounded-lg font-medium hover:bg-[#3396D3]/80 transition paragraphe">Changer le mot de passe</a>
                            <button id="supprimer_le_compte" data-id_utilisateur='<?= htmlspecialchars($data_utilisateur['id']) ?>' class="w-full cursor-pointer bg-red-500 text-white py-2 px-6 rounded-lg font-medium hover:bg-red-600 transition paragraphe">Supprimer le compte</button>
                            <button id="sauvegarder_les_modifications" class="w-full cursor-pointer bg-black text-white py-2 px-6 rounded-lg font-medium hover:bg-black/80 transition paragraphe">Sauvegarder les modifications</button>
                        </div>
                    </div>
                </div>

            </form>

        </section>

        <!-- SUPPRESSION COMPTE MODAL-->
        <section id="suppression-box" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-50">
            <div class="bg-white w-100 max-h-[80vh] rounded-2xl p-5 overflow-y-auto shadow-lg flex flex-col gap-4 relative">
                <button id="close-suppression" class="absolute top-3 right-4 text-gray-400 hover:text-black cursor-pointer text-xl">&times;</button>
                <h2 class="titre text-lg font-semibold text-gray-800">Suppression du compte</h2>
                <p class="paragraphe text-gray-700">Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>

                <div class="flex justify-end gap-3 mt-4">
                    <button id="annuler-suppression" class="px-4 cursor-pointer py-2 bg-gray-300 rounded-lg hover:bg-gray-400 paragraphe transition">Annuler</button>
                    <button id="valider-suppression" class="px-4 cursor-pointer py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 paragraphe transition">Supprimer</button>
                </div>
            </div>
        </section>

        <!-- NOTIFICATIONS -->
        <section id="notif-box" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-50">
            <div class="bg-white w-96 max-h-[80vh] rounded-2xl p-5 overflow-y-auto shadow-lg flex flex-col gap-4 relative">
                <button id="close-notif" class="absolute top-3 right-4 text-gray-400 hover:text-black cursor-pointer text-xl">&times;</button>
                <h2 class="titre text-lg font-semibold text-gray-800">Notifications</h2>

                <!-- exemples de notifications -->
                <?php foreach($notifications as $notif): ?>
                    <div class="border border-gray-200 rounded-lg p-3 <?php echo $notif['lue'] == 0 ? 'bg-gray-50' : ''; ?>">
                        <h3 class="titre text-sm font-semibold text-gray-800 flex flex-col">
                            <?php echo htmlspecialchars($notif['titre']); ?>
                        </h3>
                        
                        <p class="paragraphe text-sm text-gray-600">
                            <?php echo htmlspecialchars($notif['nom']); ?> •
                            <?php echo htmlspecialchars($notif['contenu']); ?>
                        </p>
                        <p class="text-xs text-gray-400 mt-1">
                            <?php date_default_timezone_set('Africa/Lome');  ?>
                            <?php echo timeAgo($notif['created_at']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>

        <!-- MESSAGERIE -->
        <section id="section3" class="section w-full h-full rounded-lg p-4 flex flex-col text-white hidden">
            <!-- En-tête -->
            <div class="flex justify-between items-center border-b border-white/20 p-4">
                <h2 class="titre text-lg font-semibold text-black">Messagerie</h2>
            </div>

            <!-- Contenu principal -->
            <div class="flex flex-1 gap-4 p-4">

                <!-- Liste des conversations -->

                <div class="w-20 lg:w-1/3 bg-white rounded-lg overflow-y-auto hide-scrollbar p-2 flex flex-col gap-2">

                    <?php if($abonnements):?>

                        <?php foreach($abonnements as $abonnement): ?>

                            <?php
                                //DERNIER MESSAGE
                                $sql_dernier = "SELECT 
                                                    contenu, 
                                                    date_envoi, 
                                                    expediteur_id
                                                FROM Messages
                                                WHERE 
                                                    (expediteur_id = :idSession AND destinataire_id = :idSuiveur)
                                                    OR
                                                    (expediteur_id = :idSuiveur AND destinataire_id = :idSession)
                                                ORDER BY date_envoi DESC
                                                LIMIT 1";

                                $stmt = $pdo->prepare($sql_dernier);
                                $stmt->execute([
                                    'idSession' => $id_session,
                                    'idSuiveur' => $abonnement['id_suiveur']
                                ]);
                                $dernier_message = $stmt->fetch(PDO::FETCH_ASSOC);


                                //NON LUS
                                $sql_non_lus = "SELECT COUNT(*) AS non_lus
                                                FROM Messages
                                                WHERE destinataire_id = :idSession
                                                AND expediteur_id = :idSuiveur
                                                AND lu = 0";
                                $stmt = $pdo->prepare($sql_non_lus);
                                $stmt->execute([
                                    'idSession' => $id_session,
                                    'idSuiveur' => $abonnement['id_suiveur']
                                ]);
                                $nb_non_lus = $stmt->fetch(PDO::FETCH_ASSOC)['non_lus'] ?? 0;
                            ?>

                            <a href="<?php echo htmlspecialchars($id_session)."_".htmlspecialchars($abonnement['id_suiveur']); ?>"  data-link-indice = "<?php echo htmlspecialchars($id_session)."_".htmlspecialchars($abonnement['id_suiveur']); ?>"
                                class="relative target_link w-full flex items-center justify-center lg:justify-between lg:gap-3 p-2 rounded-lg bg-black/10 hover:bg-black/20 cursor-pointer relative">

                                <div class="flex justify-center lg:justify-start items-center gap-0 lg:gap-3">

                                    <?php
                                        $nom = strtoupper(substr($abonnement['nom'], 0, 1));
                                        $hash = md5($nom);
                                        $color = '#' . substr($hash, 0, 6);
                                    ?>

                                    <span style="color: <?= $color ?>;" class="w-10 h-10 bg-black rounded-lg flex justify-center items-center font-bold">

                                        <?= 
                                            strtoupper(htmlspecialchars(
                                            mb_substr($abonnement['nom'] ?? '', 0, 1) .
                                            mb_substr($abonnement['prenom'] ?? '', 0, 1)
                                            )) ?: 'N/A' 
                                        ?>

                                    </span>

                                    <div>

                                        <h3 class="hidden lg:flex titre text-md font-semibold text-black">
                                            <?= htmlspecialchars($abonnement['nom'])." ".htmlspecialchars($abonnement['prenom']); ?>
                                        </h3>

                                        <p class="hidden lg:flex paragraphe text-xs text-gray-500 truncate w-40 dernier_message" data-user="<?php echo htmlspecialchars($abonnement['id_suiveur'])?>">
                                            <?= htmlspecialchars($dernier_message['contenu'] ?? "Aucun message") ?>
                                        </p>

                                    </div>

                                </div>

                                <div class="flex flex-col items-end">

                                    <?php if(!empty($dernier_message['date_envoi'])): ?>
                                        <p class="hidden lg:flex text-[10px] text-gray-400">
                                            <?= date("H:i", strtotime($dernier_message['date_envoi'])) ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- <span  class="hidden lg:block bg-[#3396D3] text-white text-[10px] rounded-full px-2 py-[2px] mt-1 <?= ($nb_non_lus > 0) ? '' : 'hidden' ?> indice_counter">
                                        <?= ($nb_non_lus > 0) ? $nb_non_lus : '' ?>
                                    </span> -->

                                </div>

                                    <span  class="flex lg:hidden absolute top-0 right-0 bg-[#3396D3] text-white text-[10px] rounded-full px-2 py-[2px] mt-1 <?= ($nb_non_lus > 0) ? '' : 'hidden' ?> indice_counter">
                                        <?= ($nb_non_lus > 0) ? $nb_non_lus : 0 ?>  
                                    </span>
                            </a>

                        <?php endforeach ?>
                    <?php else:?>
                        <div class="w-full flex justify-center py-4 items-center paragraphe text-black">
                            <p class="text-center">Aucun message pour l'instant</p>
                        </div>
                    <?php endif ?>

                </div>

                <!-- Fenêtre d'accueil -->

                    <div class="bg-white flex-1 rounded-lg flex flex-col gap-3 overflow-y-auto hide-scrollbar paragraphe flex justify-center items-center discussion_accueil">

                        <!-- Message par défaut centré -->
                        <div class="self-center bg-black/10 rounded-lg px-3 py-2 max-w-xs flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M20 2H4a2 2 0 0 0-2 2v18l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2"/></svg>
                            <p class="text-sm text-black">Commencez la discussion ici...</p>
                        </div>

                    </div>

                <!-- Fenêtre de discussion -->

                    <div class="flex-1 bg-white  rounded-lg flex flex-col justify-between p-4 main_container hidden">

                        <div class="flex flex-col gap-3 overflow-y-auto hide-scrollbar h-[70vh] px-4 paragraphe zone_discussion">
                        </div>

                        <div class="flex items-center gap-3 mt-3">
                            <input id="msg" type="text" placeholder="Écrire un message..." class="flex-1 bg-black/10 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#3396D3] placeholder-black text-black paragraphe" />
                            <button id="envoie_de_message" class="bg-black hover:bg-[#3396D3] px-4 py-2 rounded-lg text-sm font-medium transition">Envoyer</button>
                        </div>

                    </div>

            </div>

        </section>

        <!-- PROPOSER -->
        <div id="proposer_une_competence" class="fixed inset-0 bg-black/40 z-50 w-full h-full rounded-lg flex flex-col lg:flex-row gap-2 justify-center items-center hidden ">

            <div class="bg-white h-[90%] shadow-lg rounded-xl w-full max-w-2xl p-4 relative">

                <button id="hide_proposer" class="absolute top-1 right-1 w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z" />
                    </svg>
                </button>

                <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre mt-16">Proposer une compétence</h1>
                <p class="text-gray-500 text-center mb-4 paragraphe">Partagez votre savoir et aidez la communauté à grandir.</p>

                <form id="proposition_form" class="space-y-3">
                    <!-- Titre -->
                    <div>
                        <label for="Titre_de_la_competence" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Titre de la compétence</label>
                        <input id="Titre_de_la_competence" type="text" placeholder="Ex : Initiation à Photoshop" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required />
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label for="categorie_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                        <select id="categorie_proposition" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            <?php foreach ($domaines as $domaine): ?>
                                <option value="<?= htmlspecialchars($domaine) ?>" <?= $domaine === $selected ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($domaine) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Niveau -->
                    <div>
                        <label for="niveau_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau proposé</label>
                        <select id="niveau_proposition" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required>
                            <option value="">Sélectionnez un niveau</option>
                            <option class="text-md paragraphe" value="debutant" <?= ($data_utilisateur['niveau'] ?? '') === 'debutant' ? 'selected' : '' ?>>Débutant</option>
                            <option class="text-md paragraphe" value="intermediaire" value="intermediaire" <?= ($data_utilisateur['niveau'] ?? '') === 'intermediaire' ? 'selected' : '' ?>>Intermédiaire</option>
                            <option class="text-md paragraphe" value="avance" value="avance" <?= ($data_utilisateur['niveau'] ?? '') === 'avance' ? 'selected' : '' ?>>Avancé</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Description</label>
                        <textarea id="description_proposition" placeholder="Décrivez votre compétence, vos méthodes et ce que vous proposez..." rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required></textarea>
                    </div>

                    <!-- Disponibilité -->
                    <div>
                        <label for="Disponibilite_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                        <input id="Disponibilite_proposition" type="text" placeholder="Ex : Lundi et Mercredi, de 18h - 20h" value="<?= htmlspecialchars($data_utilisateur['Disponibilite'] ?? "") ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                    </div>

                    <!-- Type d’échange -->
                    <div class="w-full">
                        <label for="Mode_d_echange_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe"> Type d'échange </label>
                        <select id="Mode_d_echange_proposition" class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            <option value="en_ligne" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'en_ligne' ? 'selected' : '') ?>>En ligne</option>
                            <option value="presentiel" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'presentiel' ? 'selected' : '') ?>>Présentiel</option>
                            <option value="les_deux" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'les_deux' ? 'selected' : '') ?>>En ligne ou présentiel (si possible)</option>
                        </select>
                    </div>

                    <!-- Lieu (optionnel) -->
                    <div>
                        <label for="Lieu_proposition" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Lieu (optionnel)</label>
                        <input id="Lieu_proposition" value="<?= htmlspecialchars($data_utilisateur['localisation'] ?? '') ?>" type="text" placeholder="Ex : Lomé, quartier Adidogomé" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                    </div>

                    <!-- CTA -->
                    <button id="btn_proposition" type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Publier ma compétence</button>
                </form>

            </div>

        </div>

        <!-- COMPETENCES -->
        <div id="chercher_une_competence" class="fixed inset-0 bg-black/40 z-50 w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 bg-black/10 justify-center items-center hidden">
            <div class="bg-white h-[90%] shadow-lg rounded-xl w-full max-w-2xl p-4 relative">
                <button id="hide_chercher" class="absolute top-1 right-1 w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z" />
                    </svg>
                </button>
                <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre mt-8">Chercher une compétence</h1>
                <p class="text-gray-500 text-center mb-8 paragraphe">Trouvez un membre prêt à vous aider à apprendre une nouvelle compétence.</p>

                <form id="chercher_form" class="space-y-5">
                    <!-- Compétence recherchée -->
                    <div>
                        <label for="titre_Competence_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Compétence recherchée</label>
                        <input id="titre_Competence_recherche" type="text" placeholder="Ex : Apprendre HTML, Cours de guitare" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required />
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label for="categorie_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                        <select id="categorie_recherche" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            <?php foreach ($domaines as $domaine): ?>
                                <option value="<?= htmlspecialchars($domaine) ?>" <?= $domaine === $selected ? 'selected' : '' ?>>
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
                            <option class="text-md paragraphe" value="debutant" <?= ($data_utilisateur['niveau'] ?? '') === 'debutant' ? 'selected' : '' ?>>Débutant</option>
                            <option class="text-md paragraphe" value="intermediaire" value="intermediaire" <?= ($data_utilisateur['niveau'] ?? '') === 'intermediaire' ? 'selected' : '' ?>>Intermédiaire</option>
                            <option class="text-md paragraphe" value="avance" value="avance" <?= ($data_utilisateur['niveau'] ?? '') === 'avance' ? 'selected' : '' ?>>Avancé</option>
                        </select>
                    </div>

                    <!-- Description / Objectif -->
                    <div>
                        <label for="description_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Objectif personnel</label>
                        <textarea id="description_recherche" placeholder="Expliquez ce que vous souhaitez apprendre ou vos motivations..." rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required></textarea>
                    </div>

                    <!-- Disponibilité -->
                    <div>
                        <label for="Disponibilite_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                        <input id="Disponibilite_recherche" type="text" placeholder="Ex : Lundi et Mercredi, de 18h - 20h" value="<?= htmlspecialchars($data_utilisateur['Disponibilite'] ?? "") ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                    </div>

                    <!-- Type d’échange -->
                    <div class="w-full">
                        <label for="Mode_d_echange_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe"> Type d'échange </label>
                        <select id="Mode_d_echange_recherche" class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                            <option value="en_ligne" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'en_ligne' ? 'selected' : '') ?>>En ligne</option>
                            <option value="presentiel" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'presentiel' ? 'selected' : '') ?>>Présentiel</option>
                            <option value="les_deux" <?= ($data_utilisateur['mode_d_echange'] ?? '' === 'les_deux' ? 'selected' : '') ?>>En ligne ou présentiel (si possible)</option>
                        </select>
                    </div>

                    <!-- Lieu (optionnel) -->
                    <div>
                        <label for="Lieu_recherche" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Lieu (optionnel)</label>
                        <input id="Lieu_recherche" value="<?= htmlspecialchars($data_utilisateur['localisation'] ?? '') ?>" type="text" placeholder="Ex : Lomé, quartier Adidogomé" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" />
                    </div>

                    <!-- CTA -->
                    <button type="submit" id="btn_recherche" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Rechercher un mentor</button>
                </form>
            </div>
        </div>

        <!-- INVITATIONS -->
        <section id="section6" class="section w-full h-[92vh] rounded-lg flex flex-col text-white hidden">

            <div class="w-full h-full flex flex-col gap-4 py-4 rounded-lg overflow-y-auto px-8">

                <!-- Titre -->
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold titre text-black">Invitations</h2>
                    <div class="flex justify-start items-center font-semibold gap-1 px-4 py-2 bold bg-black text-white rounded-lg">
                        <span class="text-sm paragraphe nombre_propositions"><?= htmlspecialchars(count($invitations)) ?></span>
                        <span class="text-sm paragraphe">Gère les invitations reçues</span>
                    </div>
                </div>

                <!-- Liste d'invitations -->
                <div class="w-full h-full flex flex-col gap-4 overflow-y-auto py-8 lg:p-8 no-scrollbar">
                    <?php if((!empty($invitations))): ?>
                    <!-- Invitation -->
                        <?php foreach ($invitations as $invitation): ?>

                            <?php
                                $nom = htmlspecialchars($invitation['nom_envoyeur']);
                                $prenom = htmlspecialchars($invitation['prenom_envoyeur']);
                                $titre = htmlspecialchars($invitation['titre_post']);
                                $point = htmlspecialchars($invitation['points_post']);
                                $type_post = $invitation['type']; // type dans Invitations : 'proposition' ou 'recherche'

                                // Message selon le type
                                $message = $type_post === 'recherche' 
                                    ? "Souhaite t’aider avec sa compétence « $titre »" 
                                    : "Recherche une aide sur « $titre »";
                            ?>

                            <div class="w-full h-auto bg-white rounded-lg p-4 space-y-2 transition invitation_card">

                                <div class="w-full h-auto flex items-center gap-3">
                                    <div class="h-12 w-12 bg-black rounded-full flex justify-center items-center text-white font-bold">
                                        <?= strtoupper($prenom[0] . $nom[0]) ?>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h2 class="text-md font-semibold titre text-black"><?= $prenom ?> <?= $nom ?></h2>
                                        <p class="text-md paragraphe text-gray-500"><?= $message ?></p>
                                    </div>

                                    <div class="hidden lg:flex ml-auto flex flex-col justify-center items-end paragraphe">
                                        <div class="text-md text-black flex justify-end items-center gap-2">                                 
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                    <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                                                </svg>
                                            </span> 
                                            <?= $point ?> pts
                                        </div>
                                        <span class="text-sm text-gray-400"><?= ucfirst($type_post) ?></span>
                                    </div>

                                </div>

                                <div class="flex justify-end items-center gap-2">

                                    <div class="flex lg:hidden text-md text-black flex justify-end items-center gap-2">                                 
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                <path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z" />
                                            </svg>
                                        </span> 
                                        <?= $point ?> pts
                                    </div>

                                    <!-- BUTTON ACCEPTER -->
                                    <button data-accepter = "<?= htmlspecialchars($invitation['id']) ?>" class="cursor-pointer btn_accepter w-12 h-8 rounded-lg flex justify-center bg-green-500 items-center hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="#fff" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>

                                    <!-- BUTTON REFUSER -->
                                    <button data-refuser = "<?= htmlspecialchars($invitation['id']) ?>" class="cursor-pointer btn_refuser w-12 h-8 rounded-lg flex justify-center bg-red-500 items-center hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="#fff" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="w-full flex justify-center py-4 items-center paragraphe text-black">
                            <p class="text-center">Aucune demande d'invitation</p>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </section>

        <!-- ACTIVITES -->
        <section id="section7" class="section w-full h-[92vh] rounded-lg flex flex-col text-white hidden">

            <!-- Titre -->
            <div class="flex justify-between items-center px-8 py-4">
                <h2 class="text-2xl font-semibold titre text-black">Historique</h2>
                <div class="flex justify-start items-center font-semibold gap-1 px-4 py-2 bold bg-black text-white rounded-lg">
                    <span class="text-sm paragraphe nombre_propositions"><?= htmlspecialchars($nombre_propositions) ?></span>
                    <span class="text-sm paragraphe"> Historique d'activités</span>
                </div>
            </div>

            <!-- Liste d'invitations -->
            <div class="w-full h-full flex flex-col gap-4 overflow-y-auto p-8">

                <?php if (!empty($historique)) : ?>
                    <?php foreach ($historique as $proposition) : ?>
                        <div class="carte_proposition bg-white rounded-lg p-4 flex flex-col lg:flex-row justify-between items-start hover:bg-gray-100 transition gap-2 lg:gap-0">
                            
                            <div class="flex-row gap-3">
                            <!-- NOM LOGO -->
                                <div class="w-10 h-10 rounded-full bg-black/10 flex justify-center items-center">
                                    <?php
                                        $nom = strtoupper(substr($proposition['nom'], 0, 1));
                                        $hash = md5($nom);
                                        $color = '#' . substr($hash, 0, 6);
                                    ?>
                                    <span style="color: <?= $color ?>;" class="font-bold text-xl ">
                                        <?= strtoupper(htmlspecialchars(
                                            mb_substr($data_utilisateur['nom'] ?? '', 0, 1) .
                                                mb_substr($data_utilisateur['prenom'] ?? '', 0, 1)
                                        )) ?: 'N/A' ?>
                                    </span>
                                </div>

                                <div class="w-full">

                                    <p class="w-full text-black font-semibold titre">

                                        <?php if($proposition['type'] === 'proposition'): ?>
                                            Vous a publié une annonce pour une proposition de compétence
                                        <?php else: ?>
                                            Vous a publié une annonce pour acquerir une compétence
                                        <?php endif ?>

                                    </p>

                                    <p class="w-full text-gray-500 text-sm paragraphe">
                                        <?= htmlspecialchars($proposition['categorie_proposition'] ?? 'Non spécifiée') ?> - 
                                        <?= date('d M Y', strtotime($proposition['date_creation'] ?? 'now')) ?>
                                    </p>

                                    <p class="w-full text-gray-700 text-sm mt-1 paragraphe">
                                        <?= htmlspecialchars(substr($proposition['description_proposition'] ?? '', 0, 100)) ?>...
                                    </p>

                                </div>

                            </div>

                            <!-- BUTTONS  -->
                            <div class="flex gap-2">
                                <!-- Modifier -->
                                    <?php if($proposition['type'] === 'proposition'): ?>

                                    <a href="modification_proposition?offre_id=<?= htmlspecialchars($proposition['id'])?>" class="w-12 h-8 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center cursor-pointer hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 512 512"><defs><path id="SVGkrQfddLX" fill="#000" d="M426.667 373.333V416H0v-42.667zM186.019 91.314l96 95.999l-143.352 143.354h-96v-96zM277.333 0l96 96l-68.686 68.686l-96-96z"/></defs><use fill-rule="evenodd" href="#SVGkrQfddLX" transform="translate(42.667 53.333)"/></svg>
                                    </a>

                                <?php else: ?>

                                    <a href="modification_recherche?offre_id=<?= htmlspecialchars($proposition['id'])?>" class="w-12 h-8 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center cursor-pointer hover:opacity-90 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 512 512"><defs><path id="SVGkrQfddLX" fill="#000" d="M426.667 373.333V416H0v-42.667zM186.019 91.314l96 95.999l-143.352 143.354h-96v-96zM277.333 0l96 96l-68.686 68.686l-96-96z"/></defs><use fill-rule="evenodd" href="#SVGkrQfddLX" transform="translate(42.667 53.333)"/></svg>
                                    </a>

                                <?php endif ?>

                                <!-- Supprimer -->
                                <button data-suppression_post="<?= htmlspecialchars($proposition['id'])?>" class="suppression_post w-12 h-8 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center cursor-pointer hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 20 20"><path fill="#EF4444" d="M17 2h-3.5l-1-1h-5l-1 1H3v2h14zM4 17a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5H4z"/></svg>
                                </button>

                                <!-- Voir -->
                                <a href="explorer?offre_id=<?= htmlspecialchars($proposition['id'])?>" class="w-12 h-8 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center cursor-pointer hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <g fill="none" stroke="#000" stroke-width="2">
                                            <circle cx="12" cy="12" r="3" />
                                            <path d="M21 12s-1-8-9-8s-9 8-9 8" />
                                        </g>
                                    </svg>
                                </a>

                                <!-- Statut -->
                                    <?php if($proposition['type'] === 'proposition'): ?>
                                    <span class="w-auto px-4 h-8 bg-blue-500/20 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center">
                                        <?= htmlspecialchars(ucfirst($proposition['type'] ?? 'Post')) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="w-auto px-4 h-8 bg-green-500/20 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center">
                                        <?= htmlspecialchars(ucfirst($proposition['type'] ?? 'Post')) ?>
                                    </span>
                                <?php endif ?>

                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-gray-500 text-center mt-4">Aucune publication trouvée.</p>
                <?php endif; ?>

            </div>

        </section>

        <!-- ENVOYER DE POINTS -->
        <div id="modalPoints" class="fixed inset-0 bg-black/50 hidden flex justify-center items-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-[80vw] p-4 relative">
                <!-- Close button -->
                <button id="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">✕</button>
                <h2 class="text-lg font-bold text-gray-800 mb-4 titre">Envoyer des points</h2>

                <!-- Formulaire -->
                <div class="w-full space-y-4 flex flex-col justify-end items-end">

                    <!-- <div class="w-[50%] h-12 flex justify-center items-center rounded-tl-lg rounded-bl-lg ">
                        <span class="w-12 h-full flex justify-center items-center rounded-tl-lg rounded-bl-lg bg-black/10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="#000" d="M10 4a6 6 0 1 0 0 12a6 6 0 0 0 0-12m-8 6a8 8 0 1 1 14.32 4.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387A8 8 0 0 1 2 10" />
                            </svg>
                        </span>

                        <form class="h-full w-full flex justify-end items-center" id="recherche_par_nom_form">
                            <input type="text" name="nom" id="nom_de_la_recherhe" placeholder="Entrer un nom ..." class="bg-black/10 px-4 h-full border-none outline-none paragraphe w-full" />
                            <button type="submit" class="w-40 bg-black h-full text-white paragraphe transition cursor-pointer rounded-tr-lg rounded-br-lg">Rechercher</button>
                        </form>

                    </div> -->

                    <div class="w-full bg-black/10 rounded-lg">

                        <ul class="w-full flex justify-between items-center paragraphe bg-black p-4 text-white rounded-tr-lg rounded-tl-lg">
                            <li class="w-1/6 px-2 border-r border-gray-300">Nom & Prenom</li>
                            <li class="w-1/2 px-2 border-r border-gray-300">Raison</li>
                            <li class="w-1/7 px-2 border-r border-gray-300 text-center">Type</li>
                            <li class="w-1/4 px-2 border-r border-gray-300">Notation</li>
                            <li class="w-1/7 px-2 border-r border-gray-300 text-center">Points</li>
                            <li class="w-1/6 px-2 "><button>Action</button></li>
                        </ul>

                        <div class="w-full flex flex-col ">

                            <?php if (!empty($invitations_point)) : ?>
                                <?php foreach ($invitations_point as $invitation) : ?>
                                    <?php 
                                        // Limite de 100 caractères
                                        $description = htmlspecialchars($invitation['proposition_description']);
                                        if (strlen($description) > 100) {
                                            $description = substr($description, 0, 100) . '...';
                                        }
                                        $type = htmlspecialchars($invitation['invitation_type']);
                                        $points = htmlspecialchars($invitation['proposition_point']);

                                        $dataPoint_proposition = htmlspecialchars($invitation['id_receveur'])."_".htmlspecialchars($invitation['id_envoyeur'])."_".htmlspecialchars($invitation['id_invitation'])."_".htmlspecialchars($invitation['id_post'])."_".$points."_".htmlspecialchars($invitation['invitation_type']);
                                        $dataPoint_recherche = htmlspecialchars($invitation['id_envoyeur'])."_".htmlspecialchars($invitation['id_receveur'])."_".htmlspecialchars($invitation['id_invitation'])."_".htmlspecialchars($invitation['id_post'])."_".$points."_".htmlspecialchars($invitation['invitation_type']);
                                        
                                        $dataNotation_proposition = htmlspecialchars($invitation['id_envoyeur'])."_".htmlspecialchars($invitation['id_receveur']) ;
                                        $dataNotation_recherche =  htmlspecialchars($invitation['id_receveur'])."_".htmlspecialchars($invitation['id_envoyeur']);

                                    ?>

                                    <ul class="w-full h-20 flex justify-between items-center paragraphe px-4 text-black border-b border-black/40 hover:bg-gray-50">

                                        <li class="w-1/6 px-2 h-full border-r border-gray-300 py-4">
                                            <?= htmlspecialchars($invitation['utilisateur_nom']) . " " . htmlspecialchars($invitation['utilisateur_prenom']) ?>
                                        </li>

                                        
                                        <li class="w-1/2 px-2 h-full border-r border-gray-300 py-4">
                                            <?= $description ?>
                                        </li>
                                        
                                        <li class="w-1/7 px-2 h-full border-r border-gray-300 py-4 text-center">
                                            <?= htmlspecialchars($invitation['invitation_type']) ?>
                                        </li>
                                        
                                        <li id="rating" class="w-1/6 px-2 h-full border-r border-gray-300 py-4 rating flex justify-center gap-2 text-2xl cursor-pointer" style="direction: rtl;">
                                            <span data-value="5_<?php echo ($type === 'proposition') ? $dataNotation_proposition : $dataNotation_recherche; ?>" class="star">★</span>
                                            <span data-value="4_<?php echo ($type === 'proposition') ? $dataNotation_proposition : $dataNotation_recherche; ?>" class="star">★</span>
                                            <span data-value="3_<?php echo ($type === 'proposition') ? $dataNotation_proposition : $dataNotation_recherche; ?>" class="star">★</span>
                                            <span data-value="2_<?php echo ($type === 'proposition') ? $dataNotation_proposition : $dataNotation_recherche; ?>" class="star">★</span>
                                            <span data-value="1_<?php echo ($type === 'proposition') ? $dataNotation_proposition : $dataNotation_recherche; ?>" class="star">★</span>
                                        </li>

                                        <li class="w-1/7 px-2 h-full border-r border-gray-300 py-4 text-center">
                                            <?= htmlspecialchars($invitation['proposition_point']) ?>
                                        </li>

                                        <li class="w-1/7 px-2 h-full flex justify-end items-center gap-2">

                                            <?php if ($type === "proposition") : ?>
                                                <button data-point="<?= $dataPoint_proposition ?>"  class="btnSend_point px-8 h-10 bg-black hover:opacity-80 text-white paragraphe transition cursor-pointer rounded-lg">Envoyer</button>
                                            <?php elseif ($type === "recherche"): ?>
                                                <button data-point="<?= $dataPoint_recherche ?>"  class="btnSend_point px-8 h-10 bg-black hover:opacity-80 text-white paragraphe transition cursor-pointer rounded-lg">Envoyer</button>
                                            <?php endif ?>

                                            <button class="suppression_post w-10 h-10 rounded-lg flex justify-center bg-black/10 text-black paragraphe text-sm items-center cursor-pointer hover:opacity-90 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 20 20">
                                                    <path fill="#EF4444" d="M17 2h-3.5l-1-1h-5l-1 1H3v2h14zM4 17a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5H4z"/>
                                                </svg>
                                            </button>

                                        </li>
                                    </ul>

                                <?php endforeach; ?>

                            <?php else: ?>
                                <div class="w-full flex justify-center py-4 items-center paragraphe">
                                    <p class="text-center">Aucun échange en cours</p>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div id="alertModal" class="hidden text-center py-2 rounded-lg font-semibold"></div>
                </div>
            </div>
        </div>

        <!-- ABONNEMENTS -->
        <section id="section8" class="section w-full h-[92vh] rounded-lg flex flex-col text-white hidden">

            <div class="w-full h-full flex flex-col gap-4 py-4 rounded-lg overflow-y-auto px-8">

                <!-- Titre -->
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold titre text-black">Abonnements</h2>
                    <div class="flex justify-start items-center font-semibold gap-1 px-4 py-2 bold bg-black text-white rounded-lg">
                        <span class="text-sm paragraphe nombre_propositions"><?= htmlspecialchars(count($abonnemt_non_suivis)) ?></span>
                        <span class="text-sm paragraphe">Gère les abonnements reçues</span>
                    </div>
                </div>

                <!-- Liste d'invitations -->
                <div class="w-full h-full flex flex-col gap-4 overflow-y-auto py-8 lg:p-8 no-scrollbar">
                    <?php if((!empty($abonnemt_non_suivis))): ?>
                    <!-- Invitation -->
                        <?php foreach ($abonnemt_non_suivis as $abonnemt_non_suivi): ?>

                            <?php
                                $nom = htmlspecialchars($abonnemt_non_suivi['nom']);
                                $prenom = htmlspecialchars($abonnemt_non_suivi['prenom']);
                                $titre = htmlspecialchars($abonnemt_non_suivi['Domaine_principal']);
                            ?>

                            <div class="w-full h-auto bg-white rounded-lg p-4 space-y-2 transition invitation_card">
                                <div class="w-full flex flex-col lg:flex-row justify-between items-center">
                                    <div class="w-full h-auto flex items-center gap-3">
                                        <div class="w-14 h-14 lg:h-12 lg:w-12 bg-black rounded-full flex justify-center items-center text-white font-bold">
                                            <?= strtoupper($prenom[0] . $nom[0]) ?>
                                        </div>
                                        <div class="w-[80%] lg:w-full flex flex-col justify-center">
                                            <h2 class="text-md font-semibold titre text-black"><?= $prenom ?> <?= $nom ?></h2>
                                            <p class="text-md paragraphe text-gray-500"><?= $message ?></p>
                                        </div>
                                        
                                    </div>
                                    <div class="w-full mt-2 flex justify-start lg:justify-end items-center gap-2">
                                        <?php if($abonnemt_non_suivi['abonner_verifie'] === 0): ?>
                                            <!-- BUTTON REFUSER -->
                                            <button data-follow_back = "<?= htmlspecialchars($abonnemt_non_suivi['id_suiveur']."_".$id_session) ?>" class="follow_back_btn cursor-pointer  w-34 h-8 rounded-lg flex justify-center bg-red-500 items-center hover:opacity-90 transition px-4 paragraphe text-sm">
                                                suivre en retour
                                            </button>
                                        <?php else: ?>
                                            <button data-follow_back = "<?= htmlspecialchars($abonnemt_non_suivi['id_suiveur']."_".$id_session) ?>" class="w-34 h-8 rounded-lg flex justify-center bg-black items-center hover:opacity-90 transition px-4 paragraphe text-sm">
                                                Amis
                                            </button>

                                        <?php endif ?>
                                    </div>
                                </div>

                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="w-full flex justify-center py-4 items-center paragraphe text-black">
                            <p class="text-center">Aucune demande d'abonnement</p>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </section>

        <!-- MODAL MORE -->
         <div id="modalsvoirplus" class="fixed hidden inset-0 bg-black/50 flex justify-center items-center z-50 ">
            <div class="bg-white rounded-xl shadow-lg w-[90%] lg:w-[40vw] p-4 relative overflow-y-auto flex flex-col">
                <!-- Close button -->
                <button id="closeModalVue" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">✕</button>
                <h2 class="text-lg font-bold text-gray-800 mb-1 lg:mb-4 titre">Détails sur le posts</h2>
                <div class="detailsContainer">

                </div>
            </div>
         </div>

    </main>

    <script src="../js/form_filtrage.js"></script>
    <script src="../js/resize.js"></script>
    <script src="../js/notif_toggle.js"></script>
    <script src="../js/switch.js"></script>
    <script src="../js/parametre.js"></script>
    <script src="../js/proposer_une_competence.js"></script>
    <script src="../js/chercher_une_competence.js"></script>
    <script src="../js/like.js"></script>
    <script src="../js/invitation.js"></script>
    <script src="../js/suppression.js"></script> 
    <script src="../js/recherche_par_nom.js"></script>
    <script src="../js/follow.js"></script>
    <script src="../js/follow_back.js"></script>
    <script src="../js/invitation_gestion.js"></script>
    <script src="../js/notification.js"></script>
    <script src="../js/point.js"></script>
    <script src="../js/target_discussion.js"></script>
    <script src="../js/envoie_message.js"></script>
    <script src="../js/indice_message.js"></script>
    <script src="../js/notation.js"></script>
    <script src="../js/vue.js"></script>
    <script>
        // On récupère les données PHP converties en JSON
        const chartData = <?= $chartData ?>;

        // On prépare les labels et valeurs
        const labels = ["Recherche", "Proposition"];
        const values = [chartData.recherche || 0, chartData.proposition || 0];

        const ctx = document.getElementById('postsChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar', // ou 'doughnut', 'pie'
            data: {
            labels,
            datasets: [{
                label: 'Nombre de posts',
                data: values,
                backgroundColor: ['#3B82F6', '#000'],
                borderColor: ['#3B82F6', '#000'],
                borderWidth: 1
            }]
            },
            options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            },
            plugins: {
                legend: { display: false }
            }
            }
        });
    </script>

</body>