<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Categories.php";
require "model/Jobs.php";

class CategoriesController
{
  public $categories;

  public function __construct()
  {
    $this->categories = new Categories();
    $this->jobs = new Jobs();
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

    if (isset($_GET['showCategoryJobs'])) {
      $categoryJobs = $this->jobs->getCategoryJobs($_GET['showCategoryJobs']);
    }

    $categories = $this->categories->getCategories();
    include 'view/categories.php';
  }
}
