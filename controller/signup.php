<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";

class SignUpController
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    }
    include 'view/signup.php';
  }
}
