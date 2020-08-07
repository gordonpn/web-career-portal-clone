<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once 'model/User.php';

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
      $email = filter_var(trim(strtolower($_POST["email"])), FILTER_SANITIZE_EMAIL);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email.";
        include 'view/forgot.php';
        return null;
      }
      $_SESSION['email'] = $email;
      if (is_null($this->user->verifyEmail($email))) {
        $error = "User not found.";
      } else {
        $showModalPassword = true;
      }
    }

    if (isset($_POST['password'])) {
      $password = $_POST["password"];
      if ($this->user->updatePassword($_SESSION['email'], $password)) {
        $showModalPassword = false;
        $message = "Your password has been changed successfully";
      } else {
        $error = "An error has occurred.";
      }
      include 'view/dashboard.php';
      return null;
    }
    include 'view/forgot.php';
  }
}
