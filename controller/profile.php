<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";

class Profile
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

    if (isset($_GET["switchWithdrawal"])) {
      if ($this->user->updateWithdrawal($_SESSION['username'])) {
        $_SESSION["isAutomatic"] = !$_SESSION["isAutomatic"];
      } else {
        $error = "An error as occurred.";
      }
    }
    include 'view/profile.php';
  }
}
