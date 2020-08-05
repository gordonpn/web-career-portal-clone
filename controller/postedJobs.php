<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/PaymentMethod.php";

class PostedJobsController
{
  public $paymentMethod;

  public function __construct()
  {
    $this->paymentMethod = new PaymentMethod();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
      include 'view/dashboard.php';
      return null;
    }

    include 'view/postedJobs.php';
  }
}
