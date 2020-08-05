<?php
if (!isset($_SESSION)) {
  session_start();
}

$request = strtok($_SERVER["REQUEST_URI"], '?');

switch ($request) {
  case '':
  case '/':
    include __DIR__ . '/view/home.php';
    break;
  case '/dashboard':
    include "controller/dashboard.php";
    $dashboard = new Dashboard();
    $dashboard->invoke();
    break;
  case '/login':
    include "controller/login.php";
    $login = new Login();
    $login->invoke();
    break;
  case '/manageUsers':
    include "controller/manageUsers.php";
    $manageUsersController = new ManageUsersController();
    $manageUsersController->invoke();
    break;
  case '/signup':
    include "controller/signup.php";
    $signUpController = new SignUpController();
    $signUpController->invoke();
    break;
  case '/jobs':
    include "controller/jobs.php";
    $jobsController = new JobsController();
    $jobsController->invoke();
    break;
  case '/postedJobs':
    include "controller/postedJobs.php";
    $postedJobsController = new PostedJobsController();
    $postedJobsController->invoke();
    break;
  case '/categories':
    include __DIR__ . '/view/categories.php';
    break;
  case '/profile':
    include "controller/profile.php";
    $profile = new Profile();
    $profile->invoke();
    break;
  case '/forgot':
    include "controller/forgot.php";
    $forgot = new Forgot();
    $forgot->invoke();
    break;
  case '/systemActivity':
    include "controller/systemActivity.php";
    $systemActivityController = new SystemActivityController();
    $systemActivityController->invoke();
    break;
  default:
    http_response_code(404);
    include __DIR__ . '/view/404.php';
    break;
}
