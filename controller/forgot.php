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
    if (isset($_POST['email'])) {
      $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email.";
        return null;
      }
      $_SESSION['email'] = $email;
      if ($this->user->verifyEmail($email)) {
        $showModalPassword = true;
      } else {
        $error = "User not found.";
      }
    }

    if (isset($_POST['password'])) {
      $password = $_POST["password"];
      if ($this->user->updatePassword($_SESSION['email'], $password)) {
        $showModalPassword = false;
        $message = "Your password has been changed successfully";
        include 'view/login.php';
        return null;
      } else {
        $error = "An error has occurred.";
      }
    }
    include 'view/forgot.php';
  }
}
