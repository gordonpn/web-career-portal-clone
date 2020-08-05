<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Jobs.php";
require "model/PaymentMethod.php";
require "model/Location.php";

class PostJobController
{
  public $jobs;
  public $paymentMethod;
  public $location;

  public function __construct()
  {
    $this->jobs = new Jobs();
    $this->paymentMethod = new PaymentMethod();
    $this->location = new Location();
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!$this->verifyRequired()) {
        $error = "Some required information about the job posting was missing.";
        include 'view/postJob.php';
        return null;
      }

      $locationID = $this->location->createLocation(
        $_POST['address'],
        $_POST['city'],
        $_POST['postalCode'],
        $_POST['province']
      );

      if ($this->jobs->createJob(
        $_SESSION['username'],
        $locationID,
        $_POST['title'],
        $_POST['salary'],
        $_POST['description'],
        $_POST['positionsAvailable']
      )) {
        $message = "Job posted successfully.";
      } else {
        $error = "An error occurred while creating the job posting.";
      }
    }

    include 'view/postJob.php';
  }

  public function verifyRequired()
  {
    return (isset($_POST['title'])
      && isset($_POST['salary'])
      && isset($_POST['positionsAvailable'])
      && isset($_POST['description'])
      && isset($_POST['city']));
  }
}
