<?php
	$racine_path = '../';
	$title = "Merci d'avoir pris contact avec nous";
    $email = $_POST['email'];
    session_start();
	include($racine_path."templates/front/header.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des valeurs du formulaire
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        // Adresse du destinataire (celui qui reçoit le mail)
        $to = "sylvain.rochas@alumni.univ-avignon.fr";

        // Vérifier si l'email est valide

        $headers = "From: $email\r\n";

        if ($_POST['crsf'] == $_SESSION['crsf']) {

            // Envoi de l'email

            if (mail($to, $subject, $message, $headers)) {

                echo "<p class ='mt-40 flex-grow'>E-mail envoyé avec succès !</p> ";
            } else {
                echo "Échec de l'envoi de l'e-mail.";
            }
        }
}


	include($racine_path."templates/front/footer.php");
