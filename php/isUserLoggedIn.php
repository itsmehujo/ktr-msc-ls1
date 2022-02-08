<?php
session_start();
require('./classes_autoloader.inc.php');
$user = new User();
$user->fetchCurrentUser($_SESSION['email']);
if (!empty($user)) {
  echo json_encode($user);
} else {
  echo json_encode(['status' => 'error']);
}