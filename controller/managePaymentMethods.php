<?php
if (!isset($_SESSION)) {
  session_start();
}

class ManagePaymentMethodsController
{
  public function __construct()
  {
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if ($_SESSION['isAdmin']) {
      $error = "You must be an employee or employer to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      include 'view/dashboard.php';
      return null;
    }

    include 'view/managePaymentMethods.php';
  }
}
