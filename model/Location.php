<?php

require_once "model/Database.php";

class Location
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function createLocation($address, $city, $postalCode, $province)
  {
    $sql = "INSERT INTO Location(address, city, postalCode, province)
    VALUES (:address, :city, :postalCode, :province)";
    $this->_db->query($sql);
    $this->_db->bind(':address', $address, PDO::PARAM_STR);
    $this->_db->bind(':city', $city, PDO::PARAM_STR);
    $this->_db->bind(':postalCode', $postalCode, PDO::PARAM_STR);
    $this->_db->bind(':province', $province, PDO::PARAM_INT);
    return $this->_db->lastInsertId();
  }
}
