<?php

require_once "model/Database.php";

class ProfileModel
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function createProfile($username)
  {
    $sql = "INSERT INTO Profiles (userID) VALUES (:username)";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function updateProfile($username, $firstName, $lastName, $phoneNumber, $companyName, $categoryName)
  {
    $sql = "UPDATE Profiles, Employer_Categories
    SET firstName = :firstName, lastName = :lastName, phoneNumber = :phoneNumber, companyName = :companyName, categoryName = :categoryName
    WHERE Profiles.userID = :username AND Employer_Categories.userID = :userID";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':userID', $username, PDO::PARAM_STR);
    $this->_db->bind(':firstName', $firstName, PDO::PARAM_STR);
    $this->_db->bind(':lastName', $lastName, PDO::PARAM_STR);
    $this->_db->bind(':companyName', $companyName, PDO::PARAM_STR);
    $this->_db->bind(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $this->_db->bind(':categoryName', $categoryName, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function getProfile($username)
  {
    $sql = "SELECT firstName, lastName, phoneNumber, companyName, categoryName
    FROM Profiles
    JOIN Employer_Categories EC ON EC.userID = Profiles.userID
    WHERE Profiles.userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }
}
