<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/JobCategoriesList.php";
require "model/Jobs.php";
require "model/PaymentMethod.php";

class CategoriesController
{
  public $jobCategoriesList;
  public $jobs;
  public $paymentMethod;

  public function __construct()
  {
    $this->jobCategoriesList = new JobCategoriesList();
    $this->jobs = new Jobs();
    $this->paymentMethod = new PaymentMethod();
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

    if (isset($_GET['showCategoryJobs'])) {
      $jobs = $this->jobs->getCategoryJobs($_GET['showCategoryJobs']);
    }

    $categories = $this->jobCategoriesList->getCategories();
    include 'view/categories.php';
  }
}
