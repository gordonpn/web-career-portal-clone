<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";

class Login
{

  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
      $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
      $password = $_POST["password"];
      $this->checkUser($username, $password);
      return null;
    }
    include 'view/login.php';
  }

  public function checkUser($username, $password)
  {
    $user = $this->user->getUser($username, $password);

    if (is_null($user)) {
      $error = "User does not exist";
      include 'view/login.php';
      return null;
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
      $error = "Your account is deactivated. Contact an administrator to reactivate your account.";
      include 'view/login.php';
      return null;
    }

    $_SESSION["loggedIn"] = true;
    include 'view/dashboard.php';
  }
}
