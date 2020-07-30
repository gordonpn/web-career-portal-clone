<?php

// namespace Model;

// use \Model\Database;

include_once("model/Book.php");
include_once("model/User.php");
include_once("model/Database.php");

class Model
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getBookList()
  {
    return array(
      "Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),
      "Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
      "PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
    );
  }

  public function getBook($title)
  {
    $allBooks = $this->getBookList();
    return $allBooks[$title];
  }

  public function getUser($user, $password)
  {
    $sql = "SELECT userID as username, email, userType, Plans.name AS planName, isActive, startSufferingDate, balance, isAutomatic
    FROM Users, Plans
    WHERE userID = :user
    AND password = :password";
    $this->db->query($sql);
    $this->db->bind(':user', $user, PDO::PARAM_STR);
    $this->db->bind(':password', $password, PDO::PARAM_STR);
    $this->db->execute();
    $rowCount = $this->db->rowCount();
    if ($rowCount < 1) {
      return NULL;
    }
    $row = $this->db->single();

    return new User(
      $row['username'],
      $row['email'],
      $row['userType'],
      $row['planName'],
      $row['isActive'],
      $row['startSufferingDate'],
      $row['balance'],
      $row['isAutomatic']
    );
  }
}
