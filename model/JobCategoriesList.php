<?php

require_once "model/Database.php";

class JobCategoriesList
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function findJobCategory($categoryName)
  {
    $sql = "SELECT jobCategoriesID FROM Job_Categories_List WHERE categoryName = :categoryName";
    $this->_db->query($sql);
    $this->_db->bind(':categoryName', $categoryName, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }

  public function createJobCategory($categoryName)
  {
    $sql = "INSERT INTO Job_Categories_List(categoryName)
    VALUES (:categoryName)";
    $this->_db->query($sql);
    $this->_db->bind(':categoryName', $categoryName, PDO::PARAM_STR);
    $lastID = $this->_db->lastInsertId();
    return $lastID;
  }
}
