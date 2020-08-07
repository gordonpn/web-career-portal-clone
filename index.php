<?php
if (!isset($_SESSION)) {
  session_start();
}

$time = $_SERVER['REQUEST_TIME'];
$timeoutDuration = 1800;
if (isset($_SESSION['LAST_ACTIVITY'])) {
  if (($time - $_SESSION['LAST_ACTIVITY']) > $timeoutDuration) {
    session_unset();
    session_destroy();
    session_start();
  } elseif (isset($_SESSION['loggedIn'])) {
    include_once "service/refreshSession.php";
    $refreshSessionService = new RefreshSessionService();
    if (!$refreshSessionService->refreshSession(null, $_SESSION['username'])) {
      $error = "Your account is deactivated. Contact an administrator to reactivate your account.";
      include 'view/login.php';
      return null;
    }
  }
}
$_SESSION['LAST_ACTIVITY'] = $time;

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
  case '/appliedJobs':
    include "controller/appliedJobs.php";
    $appliedJobsController = new AppliedJobsController();
    $appliedJobsController->invoke();
    break;
  case '/postedJobs':
    include "controller/postedJobs.php";
    $postedJobsController = new PostedJobsController();
    $postedJobsController->invoke();
    break;
  case '/postJob':
    include "controller/postJob.php";
    $postJobController = new PostJobController();
    $postJobController->invoke();
    break;
  case '/applications':
    include "controller/applications.php";
    $applicationsController = new ApplicationsController();
    $applicationsController->invoke();
    break;
  case '/managePaymentMethods':
    include "controller/managePaymentMethods.php";
    $managePaymentMethodsController = new ManagePaymentMethodsController();
    $managePaymentMethodsController->invoke();
    break;
  case '/categories':
    include "controller/categories.php";
    $categoriesController = new CategoriesController();
    $categoriesController->invoke();
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
  case '/reports':
    include "controller/reports.php";
    $reportsController = new ReportsController();
    $reportsController->invoke();
    break;
  default:
    http_response_code(404);
    include __DIR__ . '/view/404.php';
    break;
}
