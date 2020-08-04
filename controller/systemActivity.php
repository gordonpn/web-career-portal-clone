<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/SystemActivity.php";

class SystemActivityController
{
  public $systemActivity;

  public function __construct()
  {
    $this->systemActivity = new SystemActivity();
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

    $activities = $this->systemActivity->getAllSystemActivity();
    include 'view/systemActivity.php';
  }
}
