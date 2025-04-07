<?php

$racine_path = '../';
$title = 'Login';
include($racine_path."templates/front/header.php");

$action = "./log_confirm";
$method = "POST";
if(empty($_SESSION["crsf"])){
    $_SESSION['crsf'] = bin2hex(random_bytes(32));
}
include($racine_path . "templates/front/log_formulaire.php");


if (isset($_POST) && isset($_POST['name'])) {
    echo $_POST['name'];
    $name = $_POST['name'];
    // vérifier si nom
    // vérifier si email
    // envoyer mail
    // confirmation de l'envoie
}

include($racine_path . "templates/front/footer.php");

