<?php
require('./classes_autoloader.inc.php');

if (!empty($_POST['name'])) {
  $user = new User();
  $user->createNewUser($_POST['name'], $_POST['password'], $_POST['company_name'], $_POST['email'], $_POST['phone']);

} else {
  echo json_encode(['status' => 'error', 'reason' => 'empty_name']);
}
