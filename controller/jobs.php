<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Jobs.php";

class JobsController
{
  public $jobs;

  public function __construct()
  {
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

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_GET['searchKeyword'])) {
      $jobs = $this->jobs->getJobSearch($_GET['searchKeyword']);
      include 'view/jobs.php';
      return null;
    }
    $jobs = $this->jobs->getJobs();
    include 'view/jobs.php';
  }
}
