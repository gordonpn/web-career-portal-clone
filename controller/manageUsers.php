<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once "model/User.php";

class ManageUsersController
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (!$_SESSION['isAdmin']) {
      $error = "You must be an admin to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_GET['toggleActive'])) {
      if (!$this->user->toggleUserActive($_GET['toggleActive'])) {
        $error = "An error occurred while toggling status for {$_GET['toggleActive']}";
      }
    }

    $users = $this->user->getUsersAdminTable();
    include 'view/manageUsers.php';
  }
}
