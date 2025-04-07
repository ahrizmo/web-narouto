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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST["email"]);
    $password = $_POST["password"];


    $client = new User("", $password, $email);

    if(($_POST['crsf'] == $_SESSION['crsf']) or!($client->connect($email,$password))){
        header("Location: login-1");
        exit();
    }
    $_SESSION["user"] = $email;
    setcookie("user_email", $email, time() + 604800, "/", "", true, true);
    header("Location: ./");
    // Vérifier si l'email existe déjà




    exit();
    /*$result = $client->addtodb();
    if ($result != "mail déjà utilisé") {
        header("Location: login.php");
        exit();
    }
    else{
        echo "mail déjà existant";
    }*/



}

include($racine_path . "templates/front/footer.php");

