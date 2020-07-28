<?php
if (!isset($_SESSION)) {
  session_start();
}

class Login
{
  public function __construct()
  {
  }

  public function invoke()
  {
    if (isset($_POST["username"])) {
      $_SESSION["loggedIn"] = true;
      $_SESSION["username"] = $_POST["username"];
      $_SESSION["isAdmin"] = true;
      $_SESSION["isEmployer"] = true;
      include 'view/dashboard.php';
      return null;
    }
    include 'view/login.php';
  }
}
