<?php

$racine_path = '../';
$title = "Connexion";
session_start();

include($racine_path . "templates/front/header.php");

require_once "../model/dataBase.php";
require_once "../model/clientClass.php";
require_once "../model/userClass.php";

use model\User;
use model\Client;


if(!isset($_COOKIE['mode'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mode'])) {
        // Durée de vie : 30 jours
        $duration = time() + (30 * 24 * 60 * 60);

        // Créer les cookies
        setcookie('cookies_accept', 'true', $duration, '/');
        setcookie('mode', $_POST['mode'], $duration, '/');

        // Redirection pour éviter re-post si F5
        header("Location: ../index.php");
        exit;
    }
}
else {
    header("Location: ../index.php");
}




include($racine_path . "templates/front/footer.php");

