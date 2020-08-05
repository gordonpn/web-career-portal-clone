<?php

require_once "model/Database.php";

class JobCategoriesList
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function createJobCategory($categoryName)
  {
    $sql = "INSERT INTO Job_Categories_List(categoryName)
    VALUES (:categoryName)
    ON DUPLICATE KEY UPDATE categoryName=categoryName";
    $this->_db->query($sql);
    $this->_db->bind(':categoryName', $categoryName, PDO::PARAM_STR);
    return $this->_db->lastInsertId();
  }
}
