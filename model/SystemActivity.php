<?php

require_once "model/Database.php";

class SystemActivity
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function getAllSystemActivity()
  {
    $sql = "SELECT activityID, title, description, dateRecorded FROM System_Activity";
    $this->_db->query($sql);
    return $this->_db->fetchAll();
  }
}
