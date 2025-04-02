<?php
    $rootPath = '../';
    $title = 'Add Cards';
    $action = "addCards.php";
    $method = "POST";

    include($rootPath."templates/back/header.php");

    include($rootPath."templates/back/pages/addCards.php");

    include($rootPath."templates/back/footer.php");
?>