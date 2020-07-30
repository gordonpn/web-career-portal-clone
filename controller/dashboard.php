<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("model/User.php");

class Dashboard
{
  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if (isset($_GET["logout"])) {
      $this->logOut();
    }

    if (isset($_GET["deleteAccount"])) {
      $this->user->deleteUser($_SESSION["username"]);
      $this->logout();
    } else {
      $error = "An error as occurred.";
    }

    include 'view/dashboard.php';
  }

  function logout()
  {
    session_unset();

    session_destroy();
  }
}
