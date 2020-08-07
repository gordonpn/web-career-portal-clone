<?php
if (!isset($_SESSION)) {
  session_start();
}

class Login
{
  public function invoke()
  {
    include 'view/login.php';
  }
}
