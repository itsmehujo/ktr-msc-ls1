<?php
session_start();


session_unset();
session_destroy();
setcookie("PHPSESSID", '', strtotime('-1 day'));

header('Location: ../home.php');