<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("model/User.php");

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
      $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
      $user = $this->user->getUser($username, $password);
      if (is_null($user)) {
        $error = "User does not exist";
        include 'view/login.php';
        return null;
      }
      $_SESSION["username"] = $user->username;
      $_SESSION["email"] = $user->email;
      $_SESSION["userType"] = $user->userType;
      switch ($user->userType):
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
      $_SESSION["planName"] = $user->planName;
      $_SESSION["isActive"] = $user->isActive;
      $_SESSION["startSufferingDate"] = $user->startSufferingDate;
      $_SESSION["balance"] = $user->balance;
      $_SESSION["isAutomatic"] = $user->isAutomatic;
      $_SESSION["loggedIn"] = true;
      include 'view/dashboard.php';
      return null;
    }
    include 'view/login.php';
  }
}
