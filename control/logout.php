<?php
session_start();
setcookie("user_email", "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location: ./");
