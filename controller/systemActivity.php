<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";

class SystemActivityController
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (!$_SESSION['isAdmin']) {
      $error = "You must be an admin to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    include 'view/systemActivity.php';
  }
}
