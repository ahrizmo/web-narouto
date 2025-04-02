
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <link rel="icon" type="image/png" href="./templates/images/logo.png">
        <title><?php echo $title?></title>
    </head>
    <body class="bg-black text-white flex  flex-col min-h-screen  h-full">
    <header class="fixed text-black left-0 top-5  w-full bg-orange-500 items-center justify-between shadow-lg  h-25 px-0 pr-5 rounded-lg">
        <!-- Image cliquable -->

        <!-- Menu -->
        <nav class="flex left-0 items-center justify-between w-full h-full ">
            <a href="<?php echo $racine_path.'index.php'; ?>"><img src="<?php echo $racine_path.''; ?>templates/images/logo.png" alt="Logo" class="h-25 rounded-l-lg "></a>
            <a class="navbar-brand h-full p-10" href="<?php echo $racine_path.'control/cartes.php'; ?>">Cards</a>
            <a class="navbar-brand h-full p-10" href="<?php echo $racine_path.'control/actu.php'; ?>">News</a>
            <?php if (isset($_SESSION['user'])): ?>
            <a class="navbar-brand h-full p-10" href="<?php echo $racine_path.'control/compte.php'; ?>">Compte</a>
            <?php else: ?>
                <a class="navbar-brand h-full p-10" href="<?php echo $racine_path.'control/login.php'; ?>">login</a>
            <?php endif; ?>

        </nav>
    </header>



