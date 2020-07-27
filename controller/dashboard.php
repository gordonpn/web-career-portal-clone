<?php
if (!isset($_SESSION)) {
  session_start();
}

class Dashboard
{
  public function __construct()
  {
  }

  public function invoke()
  {
    if (isset($_GET["logout"])) {
      $this->logOut();
    }
    include 'view/dashboard.php';
  }

  function logout()
  {
    session_unset();

    session_destroy();
  }
}
