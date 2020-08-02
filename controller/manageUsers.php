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
    $users = $this->user->getUsersAdminTable();
    include 'view/manageUsers.php';
  }
}
