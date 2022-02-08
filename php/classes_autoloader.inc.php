<?php
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/');
spl_autoload_register('myAutoloader');

function myAutoLoader($className)
{
  $path = ROOT_DIR . 'php/Classes/';
  $extension = ".class.php";
  $fullPath = $path . $className . $extension;


  if (!file_exists($fullPath)) {
    return false;
  }

  include_once $fullPath;
}