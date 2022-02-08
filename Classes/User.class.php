<?php
session_start();

class User extends Dbh
{
  private $connection;
  public $currentUser;

  public function __construct()
  {
    $this->connection = $this->connect();
  }

  public function fetchCurrentUser($name)
  {
    $sql = 'SELECT * FROM users WHERE name = :name';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    $this->currentUser = $stmt->fetch();

  }

  public function tryLogin($name, $password)
  {
    $this->fetchCurrentUser($name);
    if (password_verify($password, $this->currentUser['password'])) {
      return ['status' => 'success', 'user' => $this->currentUser];
    } else {
      return ['status' => 'error'];
    }
  }

  public function createNewUser($name, $password, $company_name, $email, $phone)
  {
    $this->fetchCurrentUser($name);
    if (!empty($this->currentUser)) {
      return ['status' => 'error', 'reason' => 'name'];
    }
    if (empty($phone)) {
      $phone = 0;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users(name, password, company_name, email, phone) VALUES(:name, :password, :company_name, :email, :phone)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':company_name', $company_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    try {
      $stmt->execute();
      return ['status' => 'success'];

    } catch (PDOException $e) {
      echo $e;
    }
  }
}