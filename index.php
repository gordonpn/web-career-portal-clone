<?php

// include_once("controller/Controller.php");

// $controller = new Controller();
// $controller->invoke();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/view/home.php';
        break;
    case '' :
        require __DIR__ . '/view/home.php';
        break;
    case '/dashboard' :
        require __DIR__ . '/view/dashboard.php';
        break;
    case '/login' :
        require __DIR__ . '/view/login.php';
        break;
    case '/signup' :
        require __DIR__ . '/view/signup.php';
        break;
    case '/profile' :
      require __DIR__ . '/view/profile.php';
      break;
    default:
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}
