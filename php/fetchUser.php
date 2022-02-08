<?php
session_start();
require('./classes_autoloader.inc.php');
$user = new User();
$user->fetchCurrentUser($_SESSION['name']);