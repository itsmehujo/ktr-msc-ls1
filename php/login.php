<?php

require('./classes_autoloader.inc.php');
$user = new User();
$res = $user->tryLogin($_POST['name'], $_POST['password']);

echo '</br>';
print_r($res);