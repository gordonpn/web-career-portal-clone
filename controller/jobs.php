<?php
if (!isset($_SESSION)) {
  session_start();
}

class Jobs
{
  public function __construct()
  {
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $message = "Please log in first.";
      include 'view/login.php';
      return null;
    }
  }
}
