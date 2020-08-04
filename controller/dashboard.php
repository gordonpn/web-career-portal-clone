<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";
require "model/PaymentMethod.php";

class Dashboard
{
  public $user;
  public $paymentMethod;

  public function __construct()
  {
    $this->user = new User();
    $this->paymentMethod = new PaymentMethod();
  }

  public function invoke()
  {
    if (isset($_GET["logout"])) {
      $this->logOut();
      $message = "You've logged out.";
    }

    if (isset($_GET["deleteAccount"])) {
      if ($this->user->deleteUser($_SESSION["username"])) {
        $this->logout();
      } else {
        $error = "An error as occurred.";
        include 'view/profile.php';
        return null;
      }
    }

    if (isset($_SESSION["loggedIn"])) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
    }

    include 'view/dashboard.php';
  }

  function logout()
  {
    session_unset();

    session_destroy();
  }
}
