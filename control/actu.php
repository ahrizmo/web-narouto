<?php
    $racine_path = '../';
    $title = 'Actu';
    session_start();

    include($racine_path."templates/front/header.php");

    include($racine_path . "templates/front/actu.php");

    include($racine_path."templates/front/footer.php");
?>