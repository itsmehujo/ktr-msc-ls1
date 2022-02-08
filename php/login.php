<?php
session_start();
require('./classes_autoloader.inc.php');
$user = new User();
$res = $user->tryLogin($_POST['name'], $_POST['password']);
if ($res['status'] === 'success') {
  $_SESSION['name'] = $res['user']['name'];
  $_SESSION['id'] = $res['user']['id'];
  header('Location: ../index.php');
} else {
  header('Location: ../home.php');
}