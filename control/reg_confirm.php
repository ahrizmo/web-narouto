<?php

$racine_path = '../';
$title = "Connexion";

include($racine_path . "templates/front/header.php");

require_once "../model/dataBase.php";
require_once "../model/clientClass.php";
use model\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST["email"]);
    $pseudo = ($_POST["pseudo"]);
    $password = $_POST["password"];

    if($password !== $_POST["repeat-password"]){
        echo "passwords do not match";
        exit();
    }


    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Vérifier si l'email existe déjà
    $client = new Client($pseudo, $hashedPassword, $email);
    $client->signUp();

    header("Location: login.php");
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

