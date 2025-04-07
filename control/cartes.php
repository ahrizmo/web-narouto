<?php
    $racine_path = '../';
    $title = 'Catalogue';
    session_start();
    if (!isset($_SESSION["user"]) && isset($_COOKIE["user_email"])) {
        // Recrée la session à partir du cookie
        $_SESSION["user"] = $_COOKIE["user_email"];
    }
    include($racine_path."templates/front/header.php");


    include($racine_path . "templates/front/cartes.php");

    include($racine_path."templates/front/footer.php");
?>


