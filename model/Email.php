<?php

require_once "model/Database.php";

class Email
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function getEmailCount($username)
  {
    $sql = "SELECT count(*) AS count FROM Emails WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }

  public function getEmails($username)
  {
    $sql = "SELECT title, content, dateSent FROM Emails WHERE userID = :username;";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchAll();
  }
}
