<?php
if (!isset($_SESSION)) {
  session_start();
}

$request = strtok($_SERVER["REQUEST_URI"], '?');

switch ($request) {
  case '':
  case '/':
    require __DIR__ . '/view/home.php';
    break;
  case '/dashboard':
    include_once("controller/dashboard.php");
    $dashboard = new Dashboard();
    $dashboard->invoke();
    break;
  case '/login':
    include_once("controller/login.php");
    $login = new Login();
    $login->invoke();
    break;
  case '/signup':
    require __DIR__ . '/view/signup.php';
    break;
  case '/jobs':
    require __DIR__ . '/view/jobs.php';
    break;
  case '/categories':
    require __DIR__ . '/view/categories.php';
    break;
  case '/profile':
    require __DIR__ . '/view/profile.php';
    break;
  case '/forgot':
    require __DIR__ . '/view/forgot.php';
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/view/404.php';
    break;
}
