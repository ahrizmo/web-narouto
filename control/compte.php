<?php
    $racine_path = "../";
    $title = 'Compte';
    session_start();

require_once "../model/dataBase.php";
require_once "../model/clientClass.php";
require_once "../model/userClass.php";

use model\Client;

include($racine_path."templates/front/header.php");

if(!isset($_SESSION["user"])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
$mail = $_SESSION["user"];
$client = new Client("","",$mail);
$info = $client->getInfo($mail);
$pseudo = $info['pseudo'];

$action = $racine_path."control/logout.php";
$method = "POST";


    include($racine_path . "templates/front/compte.php");



include($racine_path."templates/front/footer.php");