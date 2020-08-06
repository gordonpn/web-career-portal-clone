<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/PaymentMethod.php";
require "model/Payment.php";
require "model/Email.php";
require "model/Applications.php";
require "model/Jobs.php";

class ReportsController
{
  public $paymentMethod;
  public $payment;
  public $email;
  public $applications;
  public $jobs;

  public function __construct()
  {
    $this->paymentMethod = new PaymentMethod();
    $this->payment = new Payment();
    $this->email = new Email();
    $this->applications = new Applications();
    $this->jobs = new Jobs();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if ($_SESSION['isAdmin']) {
      $error = "You must be an employee or an employer to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
      include 'view/dashboard.php';
      return null;
    }

    $emailCount = $this->email->getEmailCount($_SESSION['username']);
    $emails = $this->email->getEmails($_SESSION['username']);
    $applicationCount = $this->applications->getApplicationCount($_SESSION['username']);
    $jobOfferedCount = $this->applications->getJobOfferedCount($_SESSION['username']);
    $jobAcceptedCount = $this->applications->getJobAcceptedCount($_SESSION['username']);
    $jobsCount = $this->jobs->getJobsCount($_SESSION['username']);
    $payments = $this->payment->getPayments($_SESSION['username']);
    $paymentCount = $this->payment->getPaymentCount($_SESSION['username']);

    include 'view/reports.php';
  }
}
