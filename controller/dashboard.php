<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";
require "model/PaymentMethod.php";

class Dashboard
{
  public $user;
  public $paymentMethod;

  public function __construct()
  {
    $this->user = new User();
    $this->paymentMethod = new PaymentMethod();
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
      $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
      $password = $_POST["password"];
      $error = $this->checkUser($username, $password);
      if (!is_null($error)) {
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

  public function checkUser($username, $password)
  {
    $user = $this->user->getUser($username, $password);

    if (is_null($user)) {
      return "User does not exist";
    }

    $userVars = get_object_vars($user);
    foreach ($userVars as $key => &$value) {

      if ($key == 'userType') {
        switch ($value):
          case 'admin':
            $_SESSION["isAdmin"] = true;
            $_SESSION["isEmployer"] = false;
            $_SESSION["isEmployee"] = false;
            break;
          case 'employer':
            $_SESSION["isAdmin"] = false;
            $_SESSION["isEmployer"] = true;
            $_SESSION["isEmployee"] = false;
            break;
          case 'employee':
            $_SESSION["isAdmin"] = false;
            $_SESSION["isEmployer"] = false;
            $_SESSION["isEmployee"] = true;
            break;
        endswitch;
      }
      $_SESSION[$key] = $value;
    }
    unset($value);

    if (!$_SESSION['isActive']) {
      session_unset();
      session_destroy();
      return "Your account is deactivated. Contact an administrator to reactivate your account.";
    }

    $_SESSION["loggedIn"] = true;
    return null;
  }
}
