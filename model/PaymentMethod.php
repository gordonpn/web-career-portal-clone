<?php

require_once "model/Database.php";

class PaymentMethod
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function updatePaymentMethodType($user, $paymentType)
  {
    $sql = "UPDATE Payment_Methods SET paymentType = :paymentType WHERE userID = :user";
    $this->_db->query($sql);
    $this->_db->bind(':user', $user, PDO::PARAM_STR);
    $this->_db->bind(':paymentType', $paymentType, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function createPaymentMethod($username, $paymentType, $cardNumber, $isPreSelected)
  {
    $sql = "INSERT INTO Payment_Methods (userID, isPreSelected, paymentType, cardNumber)
    VALUES (:username, :isPreSelected, :paymentType, :cardNumber)";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':paymentType', $paymentType, PDO::PARAM_STR);
    $this->_db->bind(':isPreSelected', $isPreSelected, PDO::PARAM_BOOL);
    $this->_db->bind(':cardNumber', $cardNumber, PDO::PARAM_INT);
    return $this->_db->execute();
  }
}
