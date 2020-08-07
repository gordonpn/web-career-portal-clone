<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once "model/User.php";
require "model/PaymentMethod.php";
require_once "service/refreshSession.php";

class Dashboard
{
  public $user;
  public $paymentMethod;
  public $refreshSessionService;

  public function __construct()
  {
    $this->user = new User();
    $this->paymentMethod = new PaymentMethod();
    $this->refreshSessionService = new RefreshSessionService();
  }

  public function invoke()
  {
    if (isset($_GET["logout"])) {
      $this->logOut();
      $message = "You've logged out.";
    }

    if (isset($_GET["deleteAccount"])) {
      if ($this->user->deleteUser($_SESSION["username"])) {
        $this->logout();
      } else {
        $error = "An error as occurred.";
        include 'view/profile.php';
        return null;
      }
    }

    if (isset($_POST["username"]) && isset($_POST["password"])) {
      $username = filter_var(trim(strtolower($_POST["username"])), FILTER_SANITIZE_STRING);
      $password = $_POST["password"];
      $user = $this->user->getUser($username, $password);
      if (is_null($user)) {
        $error = "User does not exist";
        include 'view/login.php';
        return null;
      }

      if (!$this->refreshSessionService->refreshSession($user, null)) {
        $error = "Your account is deactivated. Contact an administrator to reactivate your account.";
        include 'view/login.php';
        return null;
      }
    }

    if (isset($_SESSION["loggedIn"])) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
    }

    include 'view/dashboard.php';
  }

  function logout()
  {
    session_unset();
    session_destroy();
  }
}
