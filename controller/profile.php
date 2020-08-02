<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once "model/User.php";
require_once "model/PaymentMethod.php";
require "service/balance.php";

class Profile
{
  public $user;
  public $paymentMethod;
  public $balanceService;

  public function __construct()
  {
    $this->user = new User();
    $this->paymentMethod = new PaymentMethod();
    $this->balanceService = new BalanceService();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (isset($_GET["switchWithdrawal"])) {
      if ($this->user->updateWithdrawal($_SESSION['username'])) {
        $_SESSION["isAutomatic"] = !$_SESSION["isAutomatic"];
      } else {
        $error = "An error as occurred.";
      }
    }

    if (isset($_POST['newPaymentMethod'])) {
      if (!$this->paymentMethod->updatePaymentMethod($_SESSION['username'], $_POST["newPaymentMethod"])) {
        $error = "Could not change payment method type.";
      }
    }

    if (isset($_POST['newPlan'])) {
      if ($this->user->updatePlan($_SESSION['username'], $_POST['newPlan'])) {
        $balanceDifference = $this->balanceService->calculateBalanceDifference($_SESSION['planName'], $_POST['newPlan']);
        $newBalance = $_SESSION['balance'] + $balanceDifference;
        if ($this->user->updateBalance($_SESSION['username'], $newBalance)) {
          $_SESSION['balance'] = $newBalance;
        } else {
          $error = "Could not update balance.";
        }
        $_SESSION['planName'] = $_POST['newPlan'];
      } else {
        $error = "Could not update plan.";
      }
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      include 'view/dashboard.php';
      return null;
    }

    include 'view/profile.php';
  }
}
