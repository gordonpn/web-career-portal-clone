<?php

require_once "model/Database.php";

class Payment
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function createPayment($paymentMethodID, $amount)
  {
    $sql = "INSERT INTO Payments (paymentMethodID, amount) VALUES (:paymentMethodID, :amount)";
    $this->_db->query($sql);
    $this->_db->bind(':paymentMethodID', $paymentMethodID, PDO::PARAM_INT);
    $this->_db->bind(':amount', $amount, PDO::PARAM_INT);
    return $this->_db->execute();
  }
}
