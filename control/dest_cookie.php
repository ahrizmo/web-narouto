<?php

setcookie("cookie_consent","",time()-3600,"/");
setcookie("user_email", "", time() - 3600, "/");
setcookie("mode", "", time() - 3600, "/");


header("Location: ../index.php");
exit;