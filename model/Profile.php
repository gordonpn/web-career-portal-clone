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

  public function updateProfile()
  {
  }

  public function getProfile($username)
  {
    $sql = "SELECT * FROM Profiles WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }
}
