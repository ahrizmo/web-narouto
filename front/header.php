
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <link rel="icon" type="image/png" href="./templates/images/logo.png">
        <title><?php echo $title?></title>
    </head>
    <?php if(!isset($_COOKIE['mode']) or $_COOKIE['mode'] == "0"):?>
    <body class="bg-black text-white flex  flex-col min-h-screen  h-full">
    <?php else: ?>
    <body class="bg-red-700 text-white flex  flex-col min-h-screen  h-full">
    <?php endif; ?>
    <header class="fixed text-black  top-5  w-full bg-orange-500/90 backdrop-blur-xs items-center justify-between shadow-lg  h-25 px-0 pr-5 rounded-lg">
        <!-- Image cliquable -->

        <!-- Menu -->
        <nav class="flex left-0 items-center justify-between w-full h-full ">
            <a href="index.php"><img src="./templates/images/logo.png" alt="Logo" class="h-0 sm:h-25 rounded-l-lg "></a>
            <a class="navbar-brand h-full p-10" href="./cartes">Cards</a>
            <a class="navbar-brand h-full p-10" href="./actu">News</a>
            <?php if (isset($_SESSION['user'])): ?>
            <a class="navbar-brand h-full p-10" href="./compte"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
            <?php else: ?>
                <a class="navbar-brand h-full p-10" href="./login">login</a>
            <?php endif; ?>

        </nav>
    </header>



