<?php
require('./classes_autoloader.inc.php');
session_start();

$business = new Business();
$business->fetchBusinessesByUser($_SESSION['id']);

echo json_encode($business);