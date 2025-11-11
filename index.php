<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <link href="https://api.fontshare.com/v2/css? f[]=melodrama@500,600,700,1&f[]=satoshi@400,500,700&f[]=general-sans@500,600,700&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="css/swipe.css">
     <style>

        .titre{
            font-family: 'General Sans', sans-serif;
        }
        
        .sous_titre{
            font-family: 'Melodrama', serif;
        }
        
        .paragraphe{
            font-family: 'Satoshi', sans-serif;
        }

        .df_jcc_iac_g2{
            display: flex;
            justify-content: center;
            align-items: center;
            gap:8px
        }
        

     </style>

</head>
<body class="p-4 w-full h-full flex flex-col gap-8">

    <header class="bg-black/10 h-auto lg:h-[96vh] w-full rounded-lg">

        <nav className="sticky top-0 z-50 w-full shadow-sm">

            <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">

                <h1 class="flex df_jcc_iac_g2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                        <path fill="#000" d="M18.621 16.084a8.48 8.48 0 0 1-2.922 6.427c-.603.53-.19 1.522.613 1.442a9 9 0 0 0 1.587-.3a8.32 8.32 0 0 0 5.787-5.887a8.555 8.555 0 0 0-8.258-10.832a9 9 0 0 0-1.045.06c-.794.1-.995 1.161-.29 1.542c2.701 1.452 4.53 4.285 4.53 7.548zM7.906 18.597a8.54 8.54 0 0 1-6.45-2.913c-.532-.6-1.527-.19-1.446.61a9 9 0 0 0 .3 1.582c.794 2.823 3.064 5.026 5.907 5.766c5.727 1.492 10.87-2.773 10.87-8.229c0-.35-.02-.7-.06-1.04c-.1-.792-1.165-.992-1.547-.29a8.6 8.6 0 0 1-7.574 4.514M5.382 7.916a8.48 8.48 0 0 1 2.924-6.427c.603-.531.19-1.522-.613-1.442a10 10 0 0 0-1.598.29A8.34 8.34 0 0 0 .31 6.224a8.555 8.555 0 0 0 8.258 10.832c.352 0 .704-.02 1.045-.06c.794-.1.995-1.162.29-1.542a8.54 8.541 0 0 1-4.52-7.538zm10.72-2.513a8.54 8.54 0 0 1 6.45 2.913c.53.6 1.526.19 1.445-.61a9 9 0 0 0-.3-1.583C22.902 3.3 20.632 1.098 17.788.357C12.071-1.145 6.928 3.12 6.928 8.576c0 .35.02.7.06 1.041c.1.791 1.168.991 1.549.29A8.58 8.58 0 0 1 16.1 5.404z" />
                    </svg>
                    <a href="./" class="text-2xl font-bold titre">Nufiala</a>
                </h1>

                <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
                    <li><a href="#hero" class="paragraphe text-md text-gray-500 hidden lg:flex">Accueil</a></li>
                    <li><a href="#how" class="paragraphe text-md text-gray-500 hidden lg:flex">Fonctionnement</a></li>
                    <li><a href="#why" class="paragraphe text-md text-gray-500 hidden lg:flex">Avantages</a></li>
                    <li><a href="#testimonials" class="paragraphe text-md text-gray-500 hidden lg:flex">Témoignages</a></li>
                    <!-- <li><a href="#faq" class="paragraphe text-md text-gray-500">FAQ</a></li> -->
                </ul>
     
                <div class="hidden md:flex gap-4 text-gray-700 font-medium">

                    <a class="paragraphe text-md text-gray-500 hidden lg:flex" href="connexion/">Connexion</a>
                    <a class="paragraphe text-md text-gray-500 hidden lg:flex" href="inscription/">Rejoingnez-nous</a>

                    
                </div>
                <button id="show" class="w-12 h-8 rounded-lg flex justify-center items-center cursor-pointer hover:bg-black/20 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="#000" d="M3 4h18v2H3zm0 7h12v2H3zm0 7h18v2H3z" />
                    </svg>
                </button>

            </div>

        </nav>

        <section class="w-full h-full flex flex-col justify-center items-center">

            <div class=" w-[90%] lg:w-[60%] flex flex-col gap-6 mt-30 lg:mt-0 ">
                <h1 class="titre text-5xl font-bold flex lg:text-center">Échangez vos talents, développez de nouvelles compétences et rejoignez une communauté collaborative.</h1>
                <p class="paragraphe text-md text-start lg:text-center">Nufiala vous connecte avec des personnes passionnées prêtes à partager leurs savoir-faire. Que vous souhaitiez apprendre la guitare, le codage, une langue ou tout autre talent, notre plateforme vous permet d’échanger vos compétences de manière équitable et ludique, tout en gagnant des points à utiliser pour recevoir de l’aide.</p>
            </div>

            <div class="relative w-full lg:w-[40%] h-auto pb-4 lg:pb-0 lg:h-130 flex flex-col gap-4 md:flex md:flex-wrap md:justify-center md:gap-4">

                <div class="w-full h-36 flex justify-center items-center p-2 gap-4 lg:gap-24">
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/artisanat.webp" alt="" class="w-full h-full object-cover rounded-full"></div>
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/collab.jpg" alt="" class="w-full h-full object-cover rounded-full"></div>
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/dev.avif" alt="" class="w-full h-full object-cover rounded-full"></div>
                </div>

                <div class="w-full h-36 flex justify-center items-center p-2 gap-4 lg:gap-24">
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/languae.webp" alt="" class="w-full h-full object-cover rounded-full"></div>
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/music.jpg" alt="" class="w-full h-full object-cover rounded-full"></div>
                    <div class="w-28 h-28 rounded-full bg-white"><img src="assets/education.avif" alt="" class="w-full h-full object-cover rounded-full"></div>
                </div>
    
                <div class="w-full flex justify-center items-center gap-8 mt-12">
                    <a class="paragraphe text-md text-gray-500 bg-black px-8 py-2 rounded-md text-white" href="connexion/">Connexion</a>
                    <a class="paragraphe text-md text-gray-500 bg-white px-8 py-2 rounded-md text-black" href="inscription/">Rejoingnez-nous</a>
                </div>

            </div>
    
        </section>
    </header>

    <main class="h-auto">

        <div class="w-full rounded-lg mt-12 flex flex-col justify-start items-center">
            <h2 class="p-2 rounded-lg text-black text-center text-2xl font-bold titre">Comment ça marche ?</h2>
            <div class="w-full flex flex-col lg:flex-row lg:w-[50%] h-auto p-4 flex justify-between items-center gap-4 flex-wrap mt-8">

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M12 12.75c3.942 0 7.987 2.563 8.249 7.712a.75.75 0 0 1-.71.787c-2.08.106-11.713.171-15.077 0a.75.75 0 0 1-.711-.787C4.013 15.314 8.058 12.75 12 12.75m0-9a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Présentez-vous, indiquez vos compétences et celles que vous souhaitez acquérir</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M11 15H6l7-14v8h5l-7 14z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Affichez vos compétences offertes et celles que vous souhaitez apprendre</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 20 20"><path fill="#fff" d="M12.2 13.6a7 7 0 1 1 1.4-1.4l5.4 5.4l-1.4 1.4zM3 8a5 5 0 1 0 10 0A5 5 0 0 0 3 8"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Explorez les profils des membres pour apprendre une nouvelle compétence ou proposez la vôtre à la communauté</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="#fff" d="m21 9l-4-4v3h-7v2h7v3M7 11l-4 4l4 4v-3h7v-2H7z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Partagez vos connaissances, aidez d’autres membres et cumulez des points que vous pouvez utiliser pour apprendre à votre tour</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M11 17h2v-5h-2zm1-7q.425 0 .713-.288T13 9t-.288-.712T12 8t-.712.288T11 9t.288.713T12 10M4 21V9l8-6l8 6v12z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Offrez votre aide pour gagner des points, puis utilisez-les pour apprendre auprès d’autres membres</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="m21 12l-7-7v4C7 10 4 15 3 20c2.5-3.5 6-5.1 11-5.1V19z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Partagez votre expérience après chaque échange pour valoriser les membres et renforcer la fiabilité du réseau.</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-black/10 rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M20 2H4c-1.103 0-2 .897-2 2v18l4-4h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Laissez un avis pour inspirer confiance et renforcer la communauté</p>
                </div>
            </div>
        </div>

        <div class="w-full bg-black/10 rounded-lg mt-12 flex flex-col justify-start items-center">
            <h2 class="p-2 rounded-lg text-black text-center text-2xl font-bold titre">Avantages / Pourquoi nous choisir</h2>
            <div class="w-full flex flex-col lg:flex-row lg:w-[50%] h-auto p-4 flex justify-between items-center gap-4 flex-wrap mt-8">

                <div class="w-full lg:w-70 h-46 gap-2 bg-white rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M3 21v-6h2v4h4v2zm12 0v-2h4v-4h2v6zM3 9V3h6v2H5v4zm16 0V5h-4V3h6v6z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Gratuit et accessible – Apprenez et enseignez sans aucune barrière financière</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-white rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16"><path fill="#fff" d="M5.5 3.5a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0m1 3.5A1.5 1.5 0 0 0 5 8.5V11a3 3 0 1 0 6 0V8.5A1.5 1.5 0 0 0 9.5 7zm-2.444.97A2.5 2.5 0 0 0 4 8.5V11a4 4 0 0 0 1.213 2.87l-.1.028a3 3 0 0 1-3.673-2.121l-.389-1.45A1.5 1.5 0 0 1 2.112 8.49zm6.73 5.9A4 4 0 0 0 12 11V8.5q-.001-.274-.056-.53l1.943.52a1.5 1.5 0 0 1 1.061 1.838l-.388 1.449a3 3 0 0 1-3.773 2.093M1 5a2 2 0 1 1 4 0a2 2 0 0 1-4 0m10 0a2 2 0 1 1 4 0a2 2 0 0 1-4 0"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Communauté collaborative – Connectez-vous avec des personnes motivées et passionnées</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-white rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M17 11V8h-3V6h3V3h2v3h3v2h-3v3zM8 21q-2.075 0-3.537-1.463T3 16q0-1.2.525-2.238T5 12V6q0-1.25.875-2.125T8 3t2.125.875T11 6v6q.95.725 1.475 1.763T13 16q0 2.075-1.463 3.538T8 21M7 10h2V6q0-.425-.288-.712T8 5t-.712.288T7 6z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Système de points équitable – Vos compétences ont de la valeur et sont récompensées</p>
                </div>

                <div class="w-full lg:w-70 h-46 gap-2 bg-white rounded-lg p-2 flex flex-col justify-start items-center">
                    <span class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M4 6v10h5v-4a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v4h2V6zM0 20v-2h4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h4v2h-6a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2zm11.5 0a.5.5 0 0 0-.5.5a.5.5 0 0 0 .5.5a.5.5 0 0 0 .5-.5a.5.5 0 0 0-.5-.5m4 0a.5.5 0 0 0-.5.5a.5.5 0 0 0 .5.5a.5.5 0 0 0 .5-.5a.5.5 0 0 0-.5-.5M13 20v1h1v-1zm-2-8v7h5v-7z"/></svg>
                    </span>
                    <p class="paragraphe text-md text-center">Interface simple et moderne – Utilisez une plateforme intuitive, sur mobile ou desktop</p>
                </div>

            </div>
        </div>

        <div class="w-full rounded-lg mt-12 flex flex-col justify-start items-center">
            <h2 class="p-2 rounded-lg text-black text-center text-2xl font-bold titre">Témoignages / Avis utilisateurs</h2>
            <div class="w-full lg:w-[60%] h-auto p-4 flex justify-between items-center gap-4 flex-wrap mt-4"> 
                <section class="w-full mx-auto lg:px-4">
                    <div class="w-full carousel relative overflow-hidden p-6" tabindex="0" aria-roledescription="carousel" aria-label="Témoignages utilisateurs">
                        <div class="track-container w-full ">
                            <div class="track" style="--duration: 20s;">

                                <article class="w-80 h-46 p-4 rounded-lg bg-black/10 p-4 flex flex-col justify-around items-start">
                                    <p class="paragraphe text-md text-start">"Grâce à SkillSwap', j'ai appris la gestion de projet en 3 séances — et aidé un autre membre en design UX. Plateforme simple et humaine."</p>
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/48?img=12" alt="Avatar Claire" class="w-10 h-10 rounded-full" />
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Claire D.</div>
                                            <div class="text-xs text-gray-500">Product Manager — Paris</div>
                                        </div>
                                    </div>
                                </article>

                                <article class="w-80 h-46 p-4 rounded-lg bg-black/10 p-4 flex flex-col justify-around items-start">
                                    <p class="paragraphe text-md text-start">"Échanges justes et fluides : j'ai dépensé mes points pour une formation en Excel, super efficace."</p>
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/48?img=24" alt="Avatar Hamid" class="w-10 h-10 rounded-full" />
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Hamid S.</div>
                                            <div class="text-xs text-gray-500">Analyste — Lomé</div>
                                        </div>
                                    </div>
                                </article>

                                <article class="w-80 h-46 p-4 rounded-lg bg-black/10 p-4 flex flex-col justify-around items-start">
                                    <p class="paragraphe text-md text-start">"J'ai partagé mes compétences en guitare et gagné des points pour un cours de photographie. Communauté bienveillante."</p>
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/48?img=36" alt="Avatar Awa" class="w-10 h-10 rounded-full" />
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Awa K.</div>
                                            <div class="text-xs text-gray-500">Étudiante — Abidjan</div>
                                        </div>
                                    </div>
                                </article>

                                <article class="w-80 h-46 p-4 rounded-lg bg-black/10 p-4 flex flex-col justify-around items-start">
                                    <p class="paragraphe text-md text-start">"Design simple, notifications utiles — j'ai trouvé 2 mentors en développement web en quelques jours."</p>
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/48?img=48" alt="Avatar Jean" class="w-10 h-10 rounded-full" />
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Jean M.</div>
                                            <div class="text-xs text-gray-500">Développeur — Nantes</div>
                                        </div>
                                    </div>
                                </article>

                                <article class="w-80 h-46 p-4 rounded-lg bg-black/10 p-4 flex flex-col justify-around items-start">
                                    <p class="paragraphe text-md text-start">"Grâce à SkillSwap', j'ai appris la gestion de projet en 3 séances — et aidé un autre membre en design UX. Plateforme simple et humaine."</p>
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/48?img=12" alt="Avatar Claire" class="w-10 h-10 rounded-full" />
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Claire D.</div>
                                            <div class="text-xs text-gray-500">Product Manager — Paris</div>
                                        </div>
                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        
        <!-- <section class="max-w-4xl mx-auto px-4 py-16">
            <h2 class="p-2 rounded-lg text-black text-center text-2xl font-bold titre">Questions fréquentes</h2>
            <div id="faq" class="space-y-4">

                <div class="bg-black/10 rounded-lg">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                    <span class="paragraphe text-md text-start" >Comment gagner des points ?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="faq-content bg-black p-4 text-white hidden paragraphe text-md text-start">En aidant d’autres utilisateurs dans les compétences que vous maîtrisez.</div>
                </div>


                <div class="bg-black/10 rounded-lg">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                    <span class="paragraphe text-md text-start" >Comment dépenser mes points ?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="faq-content bg-black p-4 text-white hidden paragraphe text-md text-start">Pour demander de l’aide ou apprendre une compétence auprès de quelqu’un.</div>
                </div>


                <div class="bg-black/10 rounded-lg">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                    <span class="paragraphe text-md text-start" >SkillSwap est-il gratuit ?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="faq-content bg-black p-4 text-white hidden paragraphe text-md text-start">Oui, la plateforme est entièrement gratuite pour tous les utilisateurs.</div>
                </div>


                <div class="bg-black/10 rounded-lg">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 text-left">
                    <span class="paragraphe text-md text-start" >Est-ce sécurisé ?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="faq-content bg-black p-4 text-white hidden paragraphe text-md text-start">Oui, vos données sont protégées et les échanges évalués pour garantir la confiance.</div>
                </div>

            </div>
        </section> -->

    </main>

    <footer>
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
    
            <div>
                <h3 class="text-lg font-semibold mb-3 text-white">Liens utiles</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="paragraphe text-md text-center">À propos</a></li>
                    <li><a href="#" class="paragraphe text-md text-center">Contact</a></li>
                    <li><a href="#" class="paragraphe text-md text-center">CGU</a></li>
                    <li><a href="#" class="paragraphe text-md text-center">Politique de confidentialité</a></li>
                </ul>
            </div>

            <!-- <div class="flex justify-center md:justify-start space-x-5">
                <a href="#" class="w-12 h-12 rounded-full bg-black flex justify-center items-center" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="#fff" d="M22 4H2v16h20zm-2 4l-8 5l-8-5V6l8 5l8-5z"/></svg>
                </a>
                <a href="#" class="w-12 h-12 rounded-full bg-black flex justify-center items-center" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 256 256"><g fill="none"><rect width="256" height="256" fill="url(#SVGWRUqebek)" rx="60"/><rect width="256" height="256" fill="url(#SVGfkNpldMH)" rx="60"/><path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396s-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413s.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5s6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355s22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334s-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334"/><defs><radialGradient id="SVGWRUqebek" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse"><stop stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></radialGradient><radialGradient id="SVGfkNpldMH" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse"><stop stop-color="#3771c8"/><stop offset=".128" stop-color="#3771c8"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></radialGradient></defs></g></svg>
                </a>
                <a href="#" class="w-12 h-12 rounded-full bg-black flex justify-center items-center" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 256 256"><path fill="#0a66c2" d="M218.123 218.127h-37.931v-59.403c0-14.165-.253-32.4-19.728-32.4c-19.756 0-22.779 15.434-22.779 31.369v60.43h-37.93V95.967h36.413v16.694h.51a39.91 39.91 0 0 1 35.928-19.733c38.445 0 45.533 25.288 45.533 58.186zM56.955 79.27c-12.157.002-22.014-9.852-22.016-22.009s9.851-22.014 22.008-22.016c12.157-.003 22.014 9.851 22.016 22.008A22.013 22.013 0 0 1 56.955 79.27m18.966 138.858H37.95V95.967h37.97zM237.033.018H18.89C8.58-.098.125 8.161-.001 18.471v219.053c.122 10.315 8.576 18.582 18.89 18.474h218.144c10.336.128 18.823-8.139 18.966-18.474V18.454c-.147-10.33-8.635-18.588-18.966-18.453"/></svg>
                </a>
                <a href="#" class="w-12 h-12 rounded-full bg-black flex justify-center items-center" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16"><path fill="#fff" d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07l-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/></svg>
                </a>
            </div> -->
            </div>

            <div class="flex flex-col justify-center items-center md:items-end">
                <p class="paragraphe text-md text-center">Nufiala – Connecter, Partager, Grandir ensemble.”</p>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 paragraphe text-md text-center"> © 2025 Nufiala. Tous droits réservés.</div>
    </footer>

    <script src="js/swipe.js"></script>
</body>
</html>