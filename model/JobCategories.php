<?php

require_once "model/Database.php";

class JobCategories
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function createJobCategoryLink($jobID, $jobCategoryID)
  {
    $sql = "INSERT INTO Job_Categories(jobID, jobCategoryID) VALUES (:jobID, :jobCategoryID)";
    $this->_db->query($sql);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_INT);
    $this->_db->bind(':jobCategoryID', $jobCategoryID, PDO::PARAM_INT);
    return $this->_db->execute();
  }
}
