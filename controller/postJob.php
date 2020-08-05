<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Jobs.php";
require "model/PaymentMethod.php";
require "model/Location.php";
require "model/JobCategoriesList.php";
require "model/JobCategories.php";

class PostJobController
{
  public $jobs;
  public $paymentMethod;
  public $location;
  public $jobCategoriesList;
  public $jobCategories;

  public function __construct()
  {
    $this->jobs = new Jobs();
    $this->paymentMethod = new PaymentMethod();
    $this->location = new Location();
    $this->jobCategoriesList = new JobCategoriesList();
    $this->jobCategories = new JobCategories();
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

      $jobCategory = ucwords(strtolower($_POST['jobCategory']));

      $jobCategoryObj = $this->jobCategoriesList->findJobCategory($jobCategory);

      if (!$jobCategoryObj) {
        $jobCategoryID = $this->jobCategoriesList->createJobCategory($jobCategory);
      } else {
        $jobCategoryID = $jobCategoryObj->jobCategoriesID;
      }

      $locationID = $this->location->createLocation(
        $_POST['address'],
        ucwords(strtolower($_POST['city'])),
        $_POST['postalCode'],
        ucwords(strtolower($_POST['province']))
      );

      $jobID = $this->jobs->createJob(
        $_SESSION['username'],
        $locationID,
        $_POST['title'],
        $_POST['salary'],
        $_POST['description'],
        $_POST['positionsAvailable']
      );

      if (!is_null($jobID)) {
        if ($this->jobCategories->createJobCategoryLink($jobID, $jobCategoryID)) {
          $message = "Job posted successfully.";
        } else {
          $error = "An error occurred while creating the job posting.";
        }
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
      && isset($_POST['jobCategory'])
      && isset($_POST['city']));
  }
}
