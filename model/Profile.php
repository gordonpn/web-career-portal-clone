<?php

require_once "model/Database.php";

class Profile
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
}
