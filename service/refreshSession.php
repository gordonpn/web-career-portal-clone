<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once "model/User.php";

class RefreshSessionService
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function refreshSession($currentUser, $username)
  {
    if (is_null($currentUser)) {
      $currentUser = $this->user->getExistingUser($username);
    }

    $userVars = get_object_vars($currentUser);
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
      return false;
    }

    $_SESSION["loggedIn"] = true;
    return true;
  }
}
