<?php
	$racine_path = '../';
    $title = 'Formulaire de contact';

    session_start();
    if (!isset($_SESSION["user"]) && isset($_COOKIE["user_email"])) {
        // Recrée la session à partir du cookie
        $_SESSION["user"] = $_COOKIE["user_email"];
    }

	include($racine_path."templates/front/header.php");
	
	$action = "./confirmation";
	$method = "POST";
    if(empty($_SESSION["crsf"])){
        $_SESSION['crsf'] = bin2hex(random_bytes(32));
    }
	include($racine_path."templates/front/formulaire_contact.php");

	if (isset($_POST) && isset($_POST['name'])){
		echo $_POST['name'];
		$name = $_POST['name'];
		// vérifier si nom
		// vérifier si email
		// envoyer mail
		// confirmation de l'envoie
	}
	
	include($racine_path."templates/front/footer.php");

?>