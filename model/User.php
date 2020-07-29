<?php

class User
{
  public $username;
  public $userType;
  public $planName;
  public $isActive;
  public $startSufferingDate;
  public $balance;
  public $isAutomatic;

  public function __construct($username, $email, $userType, $planName, $isActive, $startSufferingDate, $balance, $isAutomatic)
  {
    $this->db = new Database();
    $this->username = $username;
    $this->email = $email;
    $this->userType = $userType;
    $this->planName = $planName;
    $this->isActive = $isActive;
    $this->startSufferingDate = $startSufferingDate;
    $this->balance = $balance;
    $this->isAutomatic = $isAutomatic;
  }
}
