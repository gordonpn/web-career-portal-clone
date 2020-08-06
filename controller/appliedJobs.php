<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/PaymentMethod.php";
require "model/Applications.php";

class AppliedJobsController
{
  public $paymentMethod;
  public $applications;

  public function __construct()
  {
    $this->paymentMethod = new PaymentMethod();
    $this->applications = new Applications();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (!$_SESSION['isEmployee']) {
      $error = "You must be an employee to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_GET['jobWithdraw'])) {
      if (!$this->applications->deleteApplication($_GET['jobWithdraw'], $_SESSION['username'])) {
        $error = "An error occurred while applying.";
      }
    }

    if (isset($_GET['acceptJobOffer'])) {
      if (!$this->applications->updateEmployeeAcceptance($_GET['acceptJobOffer'], $_SESSION['username'])) {
        $error = "An error occurred while updating status.";
      }
    }

    $jobs = $this->applications->getAppliedJobs($_SESSION['username']);

    include 'view/appliedJobs.php';
  }
}
