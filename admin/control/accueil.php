<?php

    // session_start();  // Démarre la session pour vérifier si l'utilisateur est connecté

    // if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] !== true) 
    // {
    //     // Si la session n'est pas définie ou si l'utilisateur n'est pas connecté, on le redirige
    //     header("Location: ../index.php");  // Redirige vers la page de connexion
    //     exit();
    // }

    $rootPath = '../';
    $title = 'Accueil';

    include($rootPath."templates/back/header.php");

    include($rootPath."templates/back/pages/accueil.php");

    include($rootPath."templates/back/footer.php");
?>