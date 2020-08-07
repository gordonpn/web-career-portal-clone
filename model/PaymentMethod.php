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
    $this->_db->bind(':isPreSelected', $isPreSelected, PDO::PARAM_INT);
    $this->_db->bind(':cardNumber', $cardNumber, PDO::PARAM_INT);
    return $this->_db->execute();
  }

  public function getPaymentMethodsOf($username)
  {
    $sql = "SELECT paymentMethodID, isPreSelected, paymentType, cardNumber
    FROM Payment_Methods
    WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchAll();
  }

  public function updatePreSelected($username, $paymentMethodID)
  {
    $sql = "UPDATE Payment_Methods SET isPreSelected = FALSE WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    if (!$this->_db->execute()) {
      return false;
    }
    $sql = "UPDATE Payment_Methods SET isPreSelected = TRUE WHERE paymentMethodID = :paymentMethodID";
    $this->_db->query($sql);
    $this->_db->bind(':paymentMethodID', $paymentMethodID, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function deletePaymentMethod($paymentMethodID)
  {
    $sql = "DELETE FROM Payment_Methods WHERE paymentMethodID = :paymentMethodID";
    $this->_db->query($sql);
    $this->_db->bind(':paymentMethodID', $paymentMethodID, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function getPaymentMethod($paymentMethodID)
  {
    $sql = "SELECT paymentMethodID, cardNumber, paymentType FROM Payment_Methods WHERE paymentMethodID = :paymentMethodID";
    $this->_db->query($sql);
    $this->_db->bind(':paymentMethodID', $paymentMethodID, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }

  public function updatePaymentMethod($paymentMethodID, $cardNumber, $paymentType)
  {
    $sql = "UPDATE Payment_Methods
    SET paymentType = :paymentType, cardNumber = :cardNumber
    WHERE paymentMethodID = :paymentMethodID";
    $this->_db->query($sql);
    $this->_db->bind(':paymentMethodID', $paymentMethodID, PDO::PARAM_STR);
    $this->_db->bind(':cardNumber', $cardNumber, PDO::PARAM_INT);
    $this->_db->bind(':paymentType', $paymentType, PDO::PARAM_STR);
    return $this->_db->execute();
  }
}
