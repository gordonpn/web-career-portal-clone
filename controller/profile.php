<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("model/User.php");

class Profile
{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function invoke()
    {
        if (isset($_GET["switchWithdrawal"])) {
            if ($this->user->updateWithdrawal($_SESSION['username'])) {
                $_SESSION["isAutomatic"] = !$_SESSION["isAutomatic"];
            }
        }
        include 'view/profile.php';
    }
}
