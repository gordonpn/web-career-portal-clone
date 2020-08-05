<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/PaymentMethod.php";
require "model/Jobs.php";

class PostedJobsController
{
  public $paymentMethod;
  public $jobs;

  public function __construct()
  {
    $this->paymentMethod = new PaymentMethod();
    $this->jobs = new Jobs();
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

    if (isset($_GET['toggleStatus'])) {
      if (!$this->jobs->updateJobStatus($_GET['toggleStatus'])) {
        $error = "An error occurred while updating job status.";
      }
    }

    if (isset($_GET['deleteJob'])) {
      if (!$this->jobs->deleteJob($_GET['deleteJob'])) {
        $error = "An error occurred while deleting job.";
      }
    }

    $postedJobs = $this->jobs->getJobsPostedBy($_SESSION['username']);

    include 'view/postedJobs.php';
  }
}
