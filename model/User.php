<?php

require "model/Database.php";

class User
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function getUser($user, $password)
  {
    $sql = "SELECT userID as username, email, Plans.userType AS userType, Plans.name AS planName, isActive, startSufferingDate, balance, isAutomatic
    FROM Users, Plans
    WHERE userID = :user
    AND password = :password
    AND Plans.planID = Users.planID";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    $this->_db->bind(':password', $password, PDO::PARAM_STR);
    $this->_db->execute();
    $rowCount = $this->_db->rowCount();
    if ($rowCount < 1) {
      return null;
    }
    $row = $this->_db->fetchOne();

    return $row;
  }

  public function updateWithdrawal($user)
  {
    $sql = "UPDATE Users SET isAutomatic = NOT isAutomatic WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function deleteUser($user)
  {
    $sql = "DELETE FROM Users WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function verifyEmail($email)
  {
    $sql = "SELECT userID FROM Users WHERE email = :email";
    $this->_db->query($sql);
    $this->_db->bind(':email', $email, PDO::PARAM_STR);
    $this->_db->execute();
    $rowCount = $this->_db->rowCount();
    if ($rowCount < 1) {
      return null;
    } else {
      return true;
    }
  }

  public function updatePassword($email, $password)
  {
    $sql = "UPDATE Users SET password = :password WHERE email = :email";
    $this->_db->query($sql);
    $this->_db->bind(':password', $password, PDO::PARAM_STR);
    $this->_db->bind(':email', $email, PDO::PARAM_STR);
    return $this->_db->execute();
  }
}
