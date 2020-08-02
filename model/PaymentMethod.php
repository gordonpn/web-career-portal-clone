<?php

require_once "model/Database.php";

class PaymentMethod
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function updatePaymentMethod($user, $payment)
  {
    $sql = "UPDATE Payment_Methods SET paymentType = :payment WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    $this->_db->bind(':payment', $payment, PDO::PARAM_STR);
    return $this->_db->execute();
  }
}
