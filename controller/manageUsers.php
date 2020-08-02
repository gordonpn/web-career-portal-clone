<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/User.php";

class ManageUsersController
{
  public $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function invoke()
  {
    if (isset($_GET['toggleActive'])) {
      if (!$this->user->toggleUserActive($_GET['toggleActive'])) {
        $error = "An error occurred while toggling status for {$_GET['toggleActive']}";
      }
    }
    $users = $this->user->getUsersAdminTable();
    include 'view/manageUsers.php';
  }
}
