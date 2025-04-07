<?php
    $racine_path = "../";
    $title = 'Compte';
    session_start();
    if (!isset($_SESSION["user"]) && isset($_COOKIE["user_email"])) {
        // Recrée la session à partir du cookie
        $_SESSION["user"] = $_COOKIE["user_email"];
    }

require_once "../model/dataBase.php";
require_once "../model/clientClass.php";
require_once "../model/userClass.php";

use model\Client;

include($racine_path."templates/front/header.php");

if(!isset($_SESSION["user"])){
    session_unset();
    session_destroy();
    header("Location: ./");
}
$mail = $_SESSION["user"];
$client = new Client("","",$mail);
$info = $client->getInfo($mail);
$pseudo = $info['pseudo'];

$action = "./logout";
$method = "POST";


    include($racine_path . "templates/front/compte.php");



include($racine_path."templates/front/footer.php");