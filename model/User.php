<?php

include_once("model/Database.php");

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getUser($user, $password)
  {
    $sql = "SELECT userID as username, email, Plans.userType AS userType, Plans.name AS planName, isActive, startSufferingDate, balance, isAutomatic
    FROM Users, Plans
    WHERE userID = :user
    AND password = :password
    AND Plans.planID = Users.planID";
    $this->db->query($sql);
    $this->db->bind(':user', $user, PDO::PARAM_STR);
    $this->db->bind(':password', $password, PDO::PARAM_STR);
    $this->db->execute();
    $rowCount = $this->db->rowCount();
    if ($rowCount < 1) {
      return null;
    }
    $row = $this->db->fetchOne();

    return $row;
  }

  public function updateWithdrawal($user)
  {
    $sql = "UPDATE Users SET isAutomatic = NOT isAutomatic WHERE userID = :user";
    $this->db->query($sql);
    $this->db->bind(':user', $user, PDO::PARAM_STR);
    return $this->db->execute();
  }

  public function deleteUser($user)
  {
    $sql = "DELETE FROM Users WHERE userID = :user";
    $this->db->query($sql);
    $this->db->bind(':user', $user, PDO::PARAM_STR);
    return $this->db->execute();
  }
}
