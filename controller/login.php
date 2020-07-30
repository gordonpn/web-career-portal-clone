<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("model/Model.php");

class Login
{

  public $model;

  public function __construct()
  {
    $this->model = new Model();
  }

  public function invoke()
  {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
      $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
      $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
      $user = $this->model->getUser($username, $password);
      if (is_null($user)) {
        $error = "User does not exist";
        include 'view/login.php';
        return NULL;
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
      return NULL;
    }
    include 'view/login.php';
  }
}
