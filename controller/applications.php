<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Applications.php";
require "model/PaymentMethod.php";

class ApplicationsController
{
  public $applications;
  public $paymentMethod;

  public function __construct()
  {
    $this->applications = new Applications();
    $this->paymentMethod = new PaymentMethod();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (!$_SESSION['isEmployer']) {
      $error = "You must be an employer to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_GET['toggleAcceptanceEmployer'])) {
      if (!$this->applications->updateEmployerAcceptance($_GET['toggleAcceptanceEmployer'], $_GET['applicant'])) {
        $error = "An error occurred updating application status.";
      }
    }

    $applications = $this->applications->getApplicationsAsEmployer($_SESSION['username']);

    include 'view/applications.php';
  }
}
