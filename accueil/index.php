<?php
    require_once('../config/auth.php');
    require_once('../scripts/read.php');
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
    
    <nav id="navbar" class="w-[12vw] h-full bg-white py-6 px-4 absolute rounded-tr-2xl rounded-br-2xl flex flex-col justify-start items left-0 top-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
        
        <div class="flex justify-start items-center gap-4">

            <button id="hide" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z"/></svg>
            </button>

            <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z"/></svg>
                <span class="text-xl font-semibold titre">Nufiala</span>
            </a>

        </div>

        <div id="menu" class="flex flex-col justify-between items-start h-full py-8 lien_conteneur transition-all duration-500 ease-in-out px-4">

            <ul class="w-full flex flex-col gap-4">

                <li class="paragraphe text-md text-justify">
                    <a href="#" data-section="section1" class="px-4 flex justify-start items-center gap-2">
                        <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3z"/></svg>
                        <span class="lien" >Accueil</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify">
                    <a href="explorer" data-section="section2" class="px-4 flex justify-start items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m-1.396-11.396l-2.957 5.749l5.75-2.957l2.956-5.749l-5.75 2.957z"/></svg>
                        <span class="lien" >Explorer</span>
                    </a>
                </li>


                <li class="paragraphe text-md text-justify">
                    <a href="#" data-section="section3" class="px-4 flex justify-start items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2"/></svg>
                        <span class="lien" >Échanges</span>
                    </a>
                </li>

            </ul>

            <ul class="flex flex-col gap-4">


                <li class="paragraphe text-md text-justify" >
                    <a href="#" data-section="section4" class="px-4 flex justify-start items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5"/><path fill="#000" fill-rule="evenodd" d="M12.68 2.806a1.4 1.4 0 0 0-1.36 0l-7.2 4A1.4 1.4 0 0 0 3.4 8.03v7.94c0 .509.276.977.72 1.224l7.2 4a1.4 1.4 0 0 0 1.36 0l7.2-4a1.4 1.4 0 0 0 .72-1.223V8.03a1.4 1.4 0 0 0-.72-1.224zM7.25 12a4.75 4.75 0 1 1 9.5 0a4.75 4.75 0 0 1-9.5 0" clip-rule="evenodd"/></svg>
                        <span class="lien" >Paramètres</span>
                    </a>
                </li>

                <li class="paragraphe text-md text-justify" >
                    <a href="#" class="px-4 flex justify-start items-center gap-2 deconnexion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M23.9917 6H6V42H24"/><path d="M33 33L42 24L33 15"/><path d="M16 23.9917H42"/></g></svg>                            
                        <span class="lien" >Déconnexion</span>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

    <main id="sections" class="h-screen w-full flex flex-col justify-between bg-black/10">

        <div class="w-full h-[8vh] px-4 py-3 flex justify-between items-center ">

            <div class="w-[13vw] h-full flex justify-start items-center gap-4">
                <button id="show" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="#000" d="M3 4h18v2H3zm0 7h12v2H3zm0 7h18v2H3z"/></svg>
                </button>
                <a href="./" class="text-lg font-bold titre logo flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z"/></svg>
                    <span class="text-xl font-semibold titre">Nufiala</span>
                </a>
            </div>

            <div class="w-[75vw] h-full bg-white flex justify-start items-center px-4 rounded-tl-lg rounded-bl-lg">

                <span class="w-8 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M10 4a6 6 0 1 0 0 12a6 6 0 0 0 0-12m-8 6a8 8 0 1 1 14.32 4.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387A8 8 0 0 1 2 10"/></svg>
                </span>

                <form class="h-full flex justify-start items-center ">
                    <input type="text" name="nom" placeholder="Votre recherche ..." class="px-4 h-full border-none outline-none paragraphe w-100"/>

                    <div class="flex justify-start items-center h-full border-l border-gray-300">
                        <span class="w-8 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M11 2.535A4 4 0 0 0 5 6v1.774c-.851.342-1.549.874-2.059 1.575C2.292 10.242 2 11.335 2 12.5c0 1.561.795 2.936 2 3.742V17.5a4.5 4.5 0 0 0 7 3.742V17.5c0-1.333-.33-2.185-.86-2.76c-.543-.587-1.424-1.024-2.804-1.254l.328-1.972c1.302.216 2.442.623 3.336 1.313zm2 0v10.292c.894-.69 2.034-1.097 3.336-1.313l.328 1.972c-1.38.23-2.261.667-2.804 1.255c-.53.574-.86 1.426-.86 2.759v3.742a4.5 4.5 0 0 0 7-3.742v-1.258c1.205-.806 2-2.18 2-3.742c0-1.165-.292-2.258-.941-3.15c-.51-.702-1.208-1.234-2.059-1.576V6a4 4 0 0 0-6-3.465"/></svg>
                        </span>
                        <input type="text" name="nom" placeholder="Compétence ..." class="px-4 h-full border-none outline-none paragraphe w-100"/>
                    </div>

                    <div class="flex justify-start items-center h-full border-l border-gray-300">
                        <span class="w-8 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#000" d="M12 2a9 9 0 0 1 9 9c0 3.074-1.676 5.59-3.442 7.395a20.4 20.4 0 0 1-2.876 2.416l-.426.29l-.2.133l-.377.24l-.336.205l-.416.242a1.87 1.87 0 0 1-1.854 0l-.416-.242l-.52-.32l-.192-.125l-.41-.273a20.6 20.6 0 0 1-3.093-2.566C4.676 16.589 3 14.074 3 11a9 9 0 0 1 9-9m0 2a7 7 0 0 0-7 7c0 2.322 1.272 4.36 2.871 5.996a18 18 0 0 0 2.222 1.91l.458.326q.222.155.427.288l.39.25l.343.209l.289.169l.455-.269l.367-.23q.293-.186.627-.417l.458-.326a18 18 0 0 0 2.222-1.91C17.728 15.361 19 13.322 19 11a7 7 0 0 0-7-7m0 3a4 4 0 1 1 0 8a4 4 0 0 1 0-8m0 2a2 2 0 1 0 0 4a2 2 0 0 0 0-4"/></g></svg>
                        </span>
                        <input type="text" name="nom" placeholder="Domaine ..." class="px-4 h-full border-none outline-none paragraphe w-100"/>
                    </div>

                    <button type="submit" class="w-40 bg-black h-full text-white paragraphe transition cursor-pointer rounded-tr-lg rounded-br-lg">Rechercher</button>
                </form>
            </div>

            <div class="w-[12vw] h-full flex justify-end items-center gap-2">
                <span id="notif-btn" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.268 21a2 2 0 0 0 3.464 0m-10.47-5.674A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                    </svg>
                </span> 

                <span class="deconnexion w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="#000"><path fill-rule="evenodd" d="M11 20a1 1 0 0 0-1-1H5V5h5a1 1 0 1 0 0-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h5a1 1 0 0 0 1-1" clip-rule="evenodd"/><path d="M21.714 12.7a1 1 0 0 0 .286-.697v-.006a1 1 0 0 0-.293-.704l-4-4a1 1 0 1 0-1.414 1.414L18.586 11H9a1 1 0 1 0 0 2h9.586l-2.293 2.293a1 1 0 0 0 1.414 1.414l4-4z"/></g></svg>
                </span>
            </div>

        </div>

        <!-- EXPLORER -->
        <section id="section2" class="section w-full hidden h-[92vh] flex justify-between items-center p-4 hidden">

            <!-- filtrage form -->
            <div class="w-[15vw] h-full bg-white">
                <section class="w-full h-full mx-auto px-4">
                    <form id="faq" class="space-y-2 form_filtrage">

                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                                <span class="paragraphe text-md text-start">Domaine de compétence</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Informatique" id="Informatique" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Informatique">Informatique</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Langues" id="Langues" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Langues">Langues</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Artisanat" id="Artisanat" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Artisanat">Artisanat</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Musique" id="Musique" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Musique">Musique</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Autres" id="Autres" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Autres">Autres</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                            </div>
                        </div>

                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                                <span class="paragraphe text-md text-start">Niveau de compétence</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Débutant" id="Débutant" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Débutant">Débutant</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Intermédiaire" id="Intermédiaire" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Intermédiaire">Intermédiaire</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Avancé" id="Avancé" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Avancé">Avancé</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Expert" id="Expert" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Expert">Expert</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                            </div>

                        </div>

                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                                <span class="paragraphe text-md text-start">Type d’échange</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="ligne" id="ligne" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="ligne">En ligne</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="présentiel" id="présentiel" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="présentiel">En présentiel</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                            </div>
                        </div>

                        <div class="w-full rounded-lg">
                            <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                                <span class="paragraphe text-md text-start">Disponibilité</span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </button>

                            <div class="w-full faq-content px-4 py-2 text-white  paragraphe text-md text-start space-y-2">

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Matin" id="Matin" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Matin"> Matin</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Apres_midi" id="Apres_midi" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Apres_midi">Après-midi</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Soir" id="Soir" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Soir"> Soir</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                                <div class="w-full flex justify-between items-center">
                                    <div class="space-x-2">
                                        <input type="checkbox" name="Week_end" id="Week_end" class="accent-black">
                                        <label class="paragraphe text-black text-md" for="Week_end">Week-end</label>
                                    </div>
                                    <span class="paragraphe text-black text-md">230</span>
                                </div>

                            </div>
                        </div>

                        <div class="w-full rounded-lg flex justify-center items-center gap-4">
                            <button type="submit" class="bg-black text-white px-4 py-2 rounded-md paragraphe cursor-pointer">Appliquer</button>
                            <button type="reset" class="bg-black/10 text-gray-800 px-4 py-2 rounded-md paragraphe text-black cursor-pointer ">Réinitialiser</button>
                        </div>

                    </form>
                </section>
            </div> 

             <!-- offres -->
            <div class="w-[85vw] h-full pl-4 space-y-4 overflow-y-scroll no-scrollbar">

                <div class="w-full h-8 flex justify-between items-center">
                    <h3 class="text-xl font-semibold paragraphe">623 Offres disponibles</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 ">

                    <div class="w-full h-90 bg-white rounded-lg p-4 space-y-1">

                        <div class="w-full h-20 flex justify-start items-start gap-2">
                            <div class="h-16 w-16 bg-red-300 rounded-lg"></div>
                            <div class="">
                                <h2 class="text-lg font-semibold titre">Apprendre la guitare acoustique</h2>
                                <h2 class="text-md font-semibold titre">Kossi Adom</h2>
                            </div>
                            <div class="ml-auto">
                                <span class="w-full h-20 text-gray-500 paragraphe text-sm ">17 oct. 2025</span>
                            </div>
                        </div>

                        <div class="w-full h-6 flex justify-start items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 2c-4.4 0-8 3.6-8 8c0 5.4 7 11.5 7.3 11.8c.2.1.5.2.7.2s.5-.1.7-.2C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8m0 17.7c-2.1-2-6-6.3-6-9.7c0-3.3 2.7-6 6-6s6 2.7 6 6s-3.9 7.7-6 9.7M12 6c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/></svg>
                            <span class="text-black paragraphe text-md font-medium">Lomé, Togo</span>
                        </div>

                        <div class="w-full h-8 flex justify-between items-center">
                            <div class="paragraphe px-4 py-1 rounded-lg">Debutant</div>

                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>4.0</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77"/></svg></span>
                            </div>

                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>20 pts</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.105.074l.014.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.092l.01-.009l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#EF4444" d="M18 5a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V8.414l-9.95 9.95a1 1 0 0 1-1.414-1.414L15.586 7H10a1 1 0 1 1 0-2z"/></g></svg></span>
                            </div>   

                        </div>

                        <div class="w-full h-20 text-black paragraphe text-md">Je souhaite apprendre à jouer des accords simples et accompagner des chansons. Objectif : pouvoir jouer 3 morceaux complets d’ici 1 mois.</div>
                        
                        <div class="w-full h-14 flex justify-start items-center gap-4">
                            <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">En ligne</span>
                        </div>

                        <div class="w-full h-12 flex justify-between items-center">
                            <div>
                                <button class="w-full cursor-pointer bg-black text-white py-2 px-4 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Demander une aide</button>
                            </div>
                            <div class="flex justify-start items-center gap-3">
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.071 13.142L13.414 18.8a2 2 0 0 1-2.828 0l-5.657-5.657A5 5 0 1 1 12 6.072a5 5 0 0 1 7.071 7.07"/></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none" stroke="#000" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M21 12s-1-8-9-8s-9 8-9 8"/></g></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m5-2a2 2 0 1 1 0 4a2 2 0 0 1 0-4m7 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4"/></svg></span>
                            </div>
                        </div>

                    </div>

                    <div class="w-full h-90 bg-white rounded-lg p-4 space-y-1">

                        <div class="w-full h-20 flex justify-start items-start gap-2">
                            <div class="h-16 w-16 bg-green-300 rounded-lg"></div>
                            <div class="">
                                <h2 class="text-lg font-semibold titre">montage vidéo avec Premiere Pro</h2>
                                <h2 class="text-md font-semibold titre">Afi Mensah</h2>
                            </div>
                            <div class="ml-auto">
                                <span class="w-full h-20 text-gray-500 paragraphe text-sm ">22 sept. 2025</span>
                            </div>
                        </div>

                        <div class="w-full h-6 flex justify-start items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 2c-4.4 0-8 3.6-8 8c0 5.4 7 11.5 7.3 11.8c.2.1.5.2.7.2s.5-.1.7-.2C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8m0 17.7c-2.1-2-6-6.3-6-9.7c0-3.3 2.7-6 6-6s6 2.7 6 6s-3.9 7.7-6 9.7M12 6c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/></svg>
                            <span class="text-black paragraphe text-md font-medium">Accra centre</span>
                        </div>

                        <div class="w-full h-8 flex justify-between items-center">
                            <div class="paragraphe px-4 py-1 rounded-lg">Senior</div>
                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>4.0</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77"/></svg></span>
                            </div>
                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>25 pts</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#22C55E" d="m8.414 17l9.95-9.95a1 1 0 0 0-1.414-1.414L7 15.586V10a1 1 0 1 0-2 0v8a1 1 0 0 0 1 1h8a1 1 0 0 0 0-2z"/></g></svg></span>
                            </div>                        
                        </div>

                        <div class="w-full h-20 text-black paragraphe text-md">
                            Formation pratique sur le montage vidéo, effets, transitions et export professionnel.
                        </div>
                        
                        <div class="w-full h-14 flex justify-start items-center gap-4">
                            <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">En ligne</span>

                        </div>

                        <div class="w-full h-12 flex justify-between items-center">
                            <div>
                                <button class="w-full cursor-pointer bg-black text-white py-2 px-4 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Demander une aide</button>
                            </div>
                            <div class="flex justify-start items-center gap-3">
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.071 13.142L13.414 18.8a2 2 0 0 1-2.828 0l-5.657-5.657A5 5 0 1 1 12 6.072a5 5 0 0 1 7.071 7.07"/></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none" stroke="#000" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M21 12s-1-8-9-8s-9 8-9 8"/></g></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m5-2a2 2 0 1 1 0 4a2 2 0 0 1 0-4m7 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4"/></svg></span>
                            </div>
                        </div>

                    </div>

                    <div class="w-full h-90 bg-white rounded-lg p-4 space-y-1">

                        <div class="w-full h-20 flex justify-start items-start gap-2">
                            <div class="h-16 w-16 bg-red-300 rounded-lg"></div>
                            <div class="">
                                <h2 class="text-lg font-semibold titre">Apprendre la guitare acoustique</h2>
                                <h2 class="text-md font-semibold titre">Kossi Adom</h2>
                            </div>
                            <div class="ml-auto">
                                <span class="w-full h-20 text-gray-500 paragraphe text-sm ">17 oct. 2025</span>
                            </div>
                        </div>

                        <div class="w-full h-6 flex justify-start items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" d="M12 2c-4.4 0-8 3.6-8 8c0 5.4 7 11.5 7.3 11.8c.2.1.5.2.7.2s.5-.1.7-.2C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8m0 17.7c-2.1-2-6-6.3-6-9.7c0-3.3 2.7-6 6-6s6 2.7 6 6s-3.9 7.7-6 9.7M12 6c-2.2 0-4 1.8-4 4s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2"/></svg>
                            <span class="text-black paragraphe text-md font-medium">Lomé, Togo</span>
                        </div>

                        <div class="w-full h-8 flex justify-between items-center">
                            <div class="paragraphe px-4 py-1 rounded-lg">Debutant</div>
                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>4.0</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77"/></svg></span>
                            </div>
                            <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center">
                                 <span>20 pts</span> 
                                 <span><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.105.074l.014.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.092l.01-.009l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#EF4444" d="M18 5a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V8.414l-9.95 9.95a1 1 0 0 1-1.414-1.414L15.586 7H10a1 1 0 1 1 0-2z"/></g></svg></span>
                            </div>                        
                        </div>

                        <div class="w-full h-20 text-black paragraphe text-md">Je souhaite apprendre à jouer des accords simples et accompagner des chansons. Objectif : pouvoir jouer 3 morceaux complets d’ici 1 mois.</div>
                        
                        <div class="w-full h-14 flex justify-start items-center gap-4">
                            <span class="paragraphe bg-black/10 px-4 py-1 rounded-lg text-sm">En ligne</span>
                        </div>

                        <div class="w-full h-12 flex justify-between items-center">
                            <div>
                                <button class="w-full cursor-pointer bg-black text-white py-2 px-4 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">Demander une aide</button>
                            </div>
                            <div class="flex justify-start items-center gap-3">
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.071 13.142L13.414 18.8a2 2 0 0 1-2.828 0l-5.657-5.657A5 5 0 1 1 12 6.072a5 5 0 0 1 7.071 7.07"/></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><g fill="none" stroke="#000" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M21 12s-1-8-9-8s-9 8-9 8"/></g></svg></span>
                                <span class="w-12 h-8 rounded-lg flex justify-center items-center resize cursor-pointer hover:bg-black/20"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m5-2a2 2 0 1 1 0 4a2 2 0 0 1 0-4m7 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4"/></svg></span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="w-full h-8 flex justify-center items-center">
                    <div class="space-x-1">
                        <button class="h-8 px-4 bg-white paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Précédent</button>            
                        <button class="w-8 h-8 paragraphe bg-[#3396D3] text-black rounded-lg font-medium">1</button>
                        <button class="w-8 h-8 paragraphe bg-white text-black rounded-lg hover:bg-[#3396D3] transition">2</button>
                        <button class="w-8 h-8 paragraphe bg-white text-black rounded-lg hover:bg-[#3396D3] transition">3</button>
                        <span class="text-black">...</span>
                        <button class="w-8 h-8 paragraphe bg-white text-black rounded-lg hover:bg-[#3396D3] transition">8</button>
                        <button class="h-8 px-4 bg-white paragraphe text-black rounded-lg hover:bg-[#3396D3] transition">Suivant</button>
                    </div>
                </div>

            </div>

        </section>

        <!-- ACCUEIL -->
        <section id="section1" class="section w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 p-4">
            <div class="w-screen lg:w-[25vw] h-[30vh] lg:h-full rounded-lg flex justify-between gap-6 items-center flex-col">

                <div class="w-full h-full flex flex-col justify-between">
                    <div class="bg-black w-full rounded-lg h-[35%]"></div>
                    <div class="flex flex-col justify-between h-[65%]">

                        <div class="flex flex-col justify-center items-center gap-2 py-8">
                            <h2 class="titre text-xl font-semibold">Gamatho Dzidula Joel</h2>
                            <p class="paragraphe font-medium"><span>Dévéloppeur Web & Mobile</span> ♦ <span>Togo</span></p>
                        </div>

                        <div class="flex justify-center items-center gap-4">
                            <button class="w-full bg-black text-white py-2 rounded-lg font-medium paragraphe">45 Amis</button>
                            <div  class="w-full flex justify-center items-center gap-2 bg-black/10 text-black py-2 rounded-lg font-medium paragraphe">
                                <span>20 pts</span> 
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z"/></svg></span>
                            </div>
                        </div>

                        <p class="paragraphe text-center">Passionné par la création d’expériences numériques intuitives et performantes, je conçois des applications web et mobiles modernes, du design jusqu’au déploiement. J’aime partager mes connaissances, apprendre de nouvelles technologies et collaborer sur des projets innovants.</p>
                        
                        <ul class="flex flex-col justify-center items-center gap-4">
                            <li class="w-full flex justify-between items-center">
                                <span>Niveau</span>
                                <span>Senior</span>
                            </li>
                            <li class="w-full flex justify-between items-center">
                                <span>Domaine principal</span>
                                <span>Développement Web</span>
                            </li>
                            <li class="w-full flex justify-between items-center">
                                <span>Note</span>
                                <div class="flex justify-end items-center gap-1 ">
                                    <span>4.0</span> 
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77"/></svg></span>
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

                <div class="w-full h-[30vh] lg:h-full bg-black/10 rounded-lg p-3 overflow-y-auto scrollbar-hide">

                    <ul class="space-y-3">

                        <!-- Élément 1 -->
                        <li class="bg-white rounded-xl p-3 flex justify-between items-center hover:shadow-lg transition">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40" alt="user" class="w-10 h-10 rounded-full">
                            <div>
                            <h3 class="font-semibold text-gray-900">Aïcha Kodjo</h3>
                            <p class="text-sm text-gray-500 paragraphe ">Propose une compétence en <span class="font-medium text-[#3396D3] paragraphe">Design UX/UI</span></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">15 Oct 2025</p>
                            <span class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full">Proposition</span>
                        </div>
                        </li>

                        <!-- Élément 2 -->
                        <li class="bg-white rounded-xl p-3 flex justify-between items-center hover:shadow-lg transition">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/41" alt="user" class="w-10 h-10 rounded-full">
                            <div>
                            <h3 class="font-semibold text-gray-900">Samuel Agbeko</h3>
                            <p class="text-sm text-gray-500 paragraphe">Recherche un mentor en <span class="font-medium text-[#3396D3] paragraphe">Développement Web</span></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">12 Oct 2025</p>
                            <span class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full">Recherche</span>
                        </div>
                        </li>

                        <!-- Élément 3 -->
                        <li class="bg-white rounded-xl p-3 flex justify-between items-center hover:shadow-lg transition">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/42" alt="user" class="w-10 h-10 rounded-full">
                            <div>
                            <h3 class="font-semibold text-gray-900">Mariam Dossou</h3>
                            <p class="text-sm text-gray-500 paragraphe">Propose des cours de <span class="font-medium text-[#3396D3] paragraphe">Marketing Digital</span></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">8 Oct 2025</p>
                            <span class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full">Proposition</span>
                        </div>
                        </li>

                    </ul>

                </div>

            </div>

        </section>

        <!-- PARAMETRES -->
        <section id="section4" class="section w-full h-full rounded-lg  hidden">
            <div id="msg_parametre"></div>
            <form class="w-full h-full flex justify-center items-start p-4 gap-4" id="form_parametre">
                <div class="w-1/2 flex flex-col gap-8 bg-white p-4 h-auto rounded-lg">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

                        <div class="w-24 h-24 rounded-xl bg-black flex justify-center items-center text-white text-3xl font-bold">
                            <?= strtoupper(htmlspecialchars(
                                mb_substr($data_utilisateur['nom'] ?? '', 0, 1) .
                                mb_substr($data_utilisateur['prenom'] ?? '', 0, 1)
                            )) ?: 'N/A' ?>
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
                                        <span><?= htmlspecialchars($data_utilisateur['note_moyenne']) ?? "" ?></span> 
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#EAB308" d="M21.12 9.88a.74.74 0 0 0-.6-.51l-5.42-.79l-2.43-4.91a.78.78 0 0 0-1.34 0L8.9 8.58l-5.42.79a.74.74 0 0 0-.6.51a.75.75 0 0 0 .18.77L7 14.47l-.93 5.4a.76.76 0 0 0 .3.74a.75.75 0 0 0 .79.05L12 18.11l4.85 2.55a.73.73 0 0 0 .35.09a.8.8 0 0 0 .44-.14a.76.76 0 0 0 .3-.74l-.94-5.4l3.93-3.82a.75.75 0 0 0 .19-.77"/></svg></span>
                                    </div>
    
                                    <div class="paragraphe px-4 py-1 rounded-lg flex justify-center items-center gap-1">
                                        <span>
                                            <?= htmlspecialchars($data_utilisateur['points']) ?? "" ?> 
                                            pt<?= ($data_utilisateur['points'] ?? 0) != 1 ? "s" : "" ?>
                                        </span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#3B82F6" d="M6 2L2 8l10 14L22 8l-4-6z"/></svg></span>
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
                                        <input id="nom" type="text" value="<?= htmlspecialchars(trim(($data_utilisateur['nom'] ?? '')))?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                    <div class="w-1/2">
                                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Prenom</label>
                                        <input id="prenom" type="text" value="<?= htmlspecialchars(trim(($data_utilisateur['prenom'] ?? '')))?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                    </div>

                                </div>
    
                                <div>
                                    <label for="nom_utilisateur" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom d'utilisateur</label>
                                    <input id="nom_utilisateur" type="text" value="<?= htmlspecialchars(trim(($pseudo ?? '')))?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
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
                                    <input  id="date_de_naissance"  disabled  type="date"  value="<?= htmlspecialchars($data_utilisateur['date_de_naissance'] ?? '2000-01-01') ?>"  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                </div>
    
                                <div>
                                    <label for="localisation" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Pays / Localisation</label>
                                    <input id="localisation" disabled type="text" value="<?= htmlspecialchars($data_utilisateur['localisation'] ?? '')?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                                </div>
    
                                <div class="sm:col-span-2">
                                    <textarea id="description_profil" rows="3" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe"  placeholder="Parlez-nous un peu de vous..."><?= htmlspecialchars($data_utilisateur['bio'] ?? '') ?></textarea>
                                </div>
                            </div>

                        </div>
    
                </div>
    
                <div class="w-1/2 flex flex-col gap-8 bg-white p-4 h-auto rounded-lg">
                    <div class="">

                        <h2 class="titre text-xl font-semibold mb-4 text-gray-800">Compétences & Disponibilités</h2>
                        <div class="space-y-8">
    
                                <div class="w-full" >
                                    <label for="domaine_principal" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Domaine principal</label>
                                    <input id="domaine_principal" type="text" value="<?= htmlspecialchars($data_utilisateur['Domaine_principal'] ?? "") ?>" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                </div>
    
                                <div class="w-full" >
                                    <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Niveau</label>
                                    <select id="niveau" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
                                        <option class="text-md paragraphe" value="debutant" <?= ($data_utilisateur['niveau'] ?? '') === 'debutant' ? 'selected' : '' ?>>Débutant</option>
                                        <option class="text-md paragraphe" value="intermediaire" value="intermediaire" <?= ($data_utilisateur['niveau'] ?? '') === 'intermediaire' ? 'selected' : '' ?>>Intermédiaire</option>
                                        <option class="text-md paragraphe" value="avance" value="avance" <?= ($data_utilisateur['niveau'] ?? '') === 'avance' ? 'selected' : '' ?>>Avancé</option>
                                    </select>
                                </div>
    

                                <div class="w-full">
                                    <label for="disponibilite" class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Disponibilité</label>
                                    <input id="disponibilite" type="text" value="Lundi au jeudi (17h–20h)" disabled class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 paragraphe">
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
                                <input id="competences_principales" type="text"  value="<?= ($data_utilisateur['Competences_principales'] ?? '') ?>" disabled class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe">
                            </div>

                        </div>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h2 class="titre text-xl font-semibold text-gray-800">Paramètres du compte</h2>
                        <div class="w-full flex flex-col justify-start items-center gap-4">
                            <button class="w-full cursor-pointer bg-[#3396D3] text-white py-2 px-6 rounded-lg font-medium hover:bg-[#3396D3]/80 transition paragraphe" >Changer le mot de passe</button>
                            <button id="supprimer_le_compte" data-id_utilisateur='<?= htmlspecialchars($data_utilisateur['id']) ?>' class="w-full cursor-pointer bg-red-500 text-white py-2 px-6 rounded-lg font-medium hover:bg-red-600 transition paragraphe" >Supprimer le compte</button>
                            <button id="sauvegarder_les_modifications" class="w-full cursor-pointer bg-black text-white py-2 px-6 rounded-lg font-medium hover:bg-black/80 transition paragraphe" >Sauvegarder les modifications</button>
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
                    <button id="annuler-suppression" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 paragraphe transition">Annuler</button>
                    <button id="valider-suppression" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 paragraphe transition">Supprimer</button>
                </div>
            </div>
        </section>
 
        <!-- NOTIFICATIONS -->
        <section id="notif-box" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-50">
            <div class="bg-white w-96 max-h-[80vh] rounded-2xl p-5 overflow-y-auto shadow-lg flex flex-col gap-4 relative">
            <button id="close-notif" class="absolute top-3 right-4 text-gray-400 hover:text-black cursor-pointer text-xl">&times;</button>
            <h2 class="titre text-lg font-semibold text-gray-800">Notifications</h2>

            <!-- exemples de notifications -->
                <div class="border border-gray-200 rounded-lg p-3">
                    <h3 class="titre text-sm font-semibold text-gray-800">Demande d’aide reçue</h3>
                    <p class="paragraphe text-sm text-gray-600">Joel a demandé ton aide en Design UX/UI.</p>
                    <p class="text-xs text-gray-400 mt-1">Il y a 10 min</p>
                </div>

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
        </section>

        <!-- MESSAGERIE -->
        <section id="section3" class="section w-full h-full rounded-lg p-4 flex flex-col text-white hidden">
            <!-- En-tête -->
            <div class="flex justify-between items-center border-b border-white/20 p-4">
                <h2 class="titre text-lg font-semibold text-black">Messagerie</h2>
                <button class="bg-black text-white px-3 py-1 rounded-lg hover:bg-[#3396D3] hover:text-white transition paragraphe">Nouveau message</button>
            </div>

            <!-- Contenu principal -->
            <div class="flex flex-1 gap-4 p-4">

                <!-- Liste des conversations -->
                <div class="w-1/3 bg-white rounded-lg overflow-y-auto hide-scrollbar p-2 flex flex-col gap-2">

                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-black/10 cursor-pointer">
                        <span class="w-10 h-10 bg-black/10 rounded-lg"></span>
                        <div>
                        <h3 class="titre text-sm font-semibold text-black">Afi Kodjo</h3>
                        <p class="paragraphe text-xs text-gray-500 truncate w-40">Salut, tu peux m’aider sur mon site ?</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-black/10 cursor-pointer">
                        <span class="w-10 h-10 bg-black/10 rounded-lg"></span>
                        <div>
                        <h3 class="titre text-sm font-semibold text-black">Jean-Paul K.</h3>
                        <p class="paragraphe text-xs text-gray-500 truncate w-40">Merci pour l’aide d’hier !</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-black/10 cursor-pointer">
                        <span class="w-10 h-10 bg-black/10 rounded-lg"></span>
                        <div>
                        <h3 class="titre text-sm font-semibold text-black">Mariam A.</h3>
                        <p class="paragraphe text-xs text-gray-500 truncate w-40">Je veux apprendre React</p>
                        </div>
                    </div>

                </div>

                <!-- Fenêtre de discussion -->
                <div class="flex-1 bg-white rounded-lg flex flex-col justify-between p-4">

                    <div class="flex flex-col gap-3 overflow-y-auto hide-scrollbar h-[60vh]">

                        <div class="self-start bg-black/10 rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm text-black">Salut Joel, disponible ce soir pour discuter ?</p>
                            <p class="text-[10px] text-gray-500 mt-1">18:42</p>
                        </div>

                        <div class="self-end bg-[#3396D3] rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm">Oui bien sûr, à 19h ça te va ?</p>
                            <p class="text-[10px] text-gray-200 mt-1">18:45</p>
                        </div>

                        <div class="self-start bg-black/10 rounded-lg px-3 py-2 max-w-xs">
                            <p class="text-sm text-black">Parfait !</p>
                            <p class="text-[10px] text-gray-500 mt-1">18:46</p>
                        </div>

                    </div>
                    <div class="flex items-center gap-3 mt-3">
                        <input type="text" placeholder="Écrire un message..."
                        class="flex-1 bg-black/10 border border-white/10 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#3396D3] placeholder-black text-white" />
                        <button class="bg-[#3396D3] px-4 py-2 rounded-lg text-sm font-medium hover:bg-white hover:text-black transition">Envoyer</button>
                    </div>

                </div>

            </div>
        </section>

        <!-- PROPOSER -->
        <div id="proposer_une_competence" class="fixed inset-0 bg-black/40 z-50 w-full h-full rounded-lg flex flex-col lg:flex-row gap-2 justify-center items-center hidden ">

            <div class="bg-white h-[95%] shadow-lg rounded-xl w-full max-w-2xl p-4 relative">

                <button id="hide_proposer" class="absolute top-1 right-1 w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z"/></svg>
                </button>

                <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre">Proposer une compétence</h1>
                <p class="text-gray-500 text-center mb-4 paragraphe">Partagez votre savoir et aidez la communauté à grandir.</p>

                <form class="space-y-3">
                    <!-- Titre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Titre de la compétence</label>
                        <input type="text" placeholder="Ex : Initiation à Photoshop" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required/>
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Catégorie</label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required>
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
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required>
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
        <div id="chercher_une_competence" class="fixed inset-0 bg-black/40 z-50 w-full h-full rounded-lg flex flex-col lg:flex-row gap-4 bg-black/10 justify-center items-center hidden">
            <div class="bg-white h-[95%] shadow-lg rounded-xl w-full max-w-2xl p-4 relative">
                <button id="hide_chercher" class="absolute top-1 right-1 w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#000" fill-rule="evenodd" d="M10.657 12.071L5 6.414L6.414 5l5.657 5.657L17.728 5l1.414 1.414l-5.657 5.657l5.657 5.657l-1.414 1.414l-5.657-5.657l-5.657 5.657L5 17.728z"/></svg>
                </button>
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

    </main>

    <script src="../js/form_filtrage.js"></script>
    <script src="../js/resize.js"></script>
    <script src="../js/notif_toggle.js"></script>
    <script src="../js/switch.js"></script>
    <script src="../js/parametre.js"></script>
    <script src="../js/decoonexion.js"></script> 



</body>
