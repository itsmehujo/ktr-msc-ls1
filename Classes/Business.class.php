<?php

class Business extends Dbh
{
  private $connection;
  public $businesses;

  public function __construct()
  {
    $this->connection = $this->connect();
  }

  public function fetchBusinessesByUser($user_id)
  {
    $sql = 'SELECT * FROM businesses
        WHERE id = ANY (SELECT id_business from associate_users_businesses 
            WHERE id_user = :user_id )';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $this->businesses = $stmt->fetchAll();
  }

  public function fetchBusinessByEmail($email)
  {
    $sql = 'SELECT * FROM businesses WHERE email = :email';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function createNewBusiness($user_id, $name, $company_name, $email, $phone)
  {
    $existingBusiness = $this->fetchBusinessByEmail($email);
    if (!empty($existingBusiness)) {
      $this->assignUserAndBusiness($user_id, $existingBusiness['id']);
    } else {
      if (empty($phone)) {
        $phone = 0;
      }
      $sql = 'INSERT INTO businesses(name, company_name, email, phone) VALUES(:name, :company_name, :email, :phone)';
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':company_name', $company_name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':phone', $phone);
      try {
        $stmt->execute();

      } catch (PDOException $e) {
        echo $e;
      }
      $business_id = $this->connection->lastInsertId();
      $this->assignUserAndBusiness($user_id, $business_id);
    }

  }

  public function assignUserAndBusiness($user_id, $business_id)
  {
    $sql = 'INSERT INTO associate_users_businesses VALUES(:user_id, :business_id)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':business_id', $business_id);
    $stmt->execute();
  }

}