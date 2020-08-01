<?php
if (!isset($_SESSION)) {
  session_start();
}

require 'model/User.php';

class Forgot
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    require 'view/forgot.php';
  }
}
