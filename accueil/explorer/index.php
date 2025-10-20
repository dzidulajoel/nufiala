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
<body class="p-4 w-full h-screen flex flex-col bg-black/10">
    <main class="h-screen w-full rounded-lg flex flex-col justify-between items-center">
        <div class="h-[10vh] w-full bg-white">
            

        </div>
        <div class="h-[86vh] w-full flex justify-center items-center gap-4 bg-white">
            <nav class="w-[18vw] h-full rounded-lg flex flex-col justify-start items-start py-2 px-4 relative"></nav>
            <section class="w-[82vw] h-full rounded-lg"></section>
        </div>
    </main>
</body>
</html>
