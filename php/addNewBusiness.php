<?php
session_start();
require('./classes_autoloader.inc.php');

$business = new Business();
if (!empty($_POST['email'])) {
  $business->createNewBusiness($_SESSION['id'], $_POST['name'], $_POST['company_name'], $_POST['email'], $_POST['phone']);

}

header('Location: ../index.php');