<?php

require_once "model/Database.php";

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
    return $this->_db->fetchOne();
  }

  public function getExistingUser($user)
  {
    $sql = "SELECT userID as username, email, Plans.userType AS userType, Plans.name AS planName, isActive, startSufferingDate, balance, isAutomatic
    FROM Users, Plans
    WHERE userID = :user
    AND Plans.planID = Users.planID";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    $this->_db->execute();
    return $this->_db->fetchOne();
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

  public function updatePlan($username, $plan)
  {
    $sql = "UPDATE Users
    SET planID = (SELECT planID
                  FROM Plans
                  WHERE name = :planName)
    WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':planName', $plan, PDO::PARAM_STR);
    $this->_db->bind(':user', $username, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function updateBalance($username, $newBalance)
  {
    $sql = "UPDATE Users SET balance = :newBalance WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':newBalance', $newBalance, PDO::PARAM_INT);
    $this->_db->bind(':user', $username, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function getUsersAdminTable()
  {
    $sql = "SELECT userID, email, Plans.userType, dateCreated, isActive, startSufferingDate
    FROM Users,
         Plans
    WHERE Users.planID = Plans.planID";
    $this->_db->query($sql);
    return $this->_db->fetchAll();
  }

  public function toggleUserActive($username)
  {
    $sql = "UPDATE Users SET isActive = NOT isActive WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $username, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function verifyUser($username)
  {
    $sql = "SELECT userID FROM Users WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $username, PDO::PARAM_STR);
    $this->_db->execute();
    $rowCount = $this->_db->rowCount();
    if ($rowCount < 1) {
      return null;
    } else {
      return true;
    }
  }

  public function createUser($username, $email, $password, $plan)
  {
    $sql = "INSERT INTO Users (userID, planID, email, password)
    VALUES (:username, (SELECT planID FROM Plans WHERE name = :plan), :email, :password)";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':plan', $plan, PDO::PARAM_STR);
    $this->_db->bind(':email', $email, PDO::PARAM_STR);
    $this->_db->bind(':password', $password, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function updateEmail($username, $email)
  {
    $sql = "UPDATE Users SET email = :email WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':email', $email, PDO::PARAM_STR);
    return $this->_db->execute();
  }
}
