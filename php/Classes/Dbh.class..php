<?php
session_start();

// Connect to DB (Sorry for no ENV variables, it's quite time-consuming to use them with vanilla PHP)

class Dbh
{
  private $host = "localhost";
  private $port = 3306;
  private $user = "root";
  private $pwd = "root";
  private $dbName = "ktr-msc-ls1";

  protected function connect()
  {

    $dsn = 'mysql:host=' . $this->host . ';dbport=' . $this->port . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->user, $this->pwd);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
}
