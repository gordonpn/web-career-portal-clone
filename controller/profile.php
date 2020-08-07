<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/Payment.php";
require "model/PaymentMethod.php";
require "model/Profile.php";
require_once "model/User.php";
require "service/balance.php";

class Profile
{
  public $balanceService;
  public $payment;
  public $paymentMethod;
  public $profile;
  public $user;

  public function __construct()
  {
    $this->balanceService = new BalanceService();
    $this->payment = new Payment();
    $this->paymentMethod = new PaymentMethod();
    $this->profile = new ProfileModel();
    $this->user = new User();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if (isset($_POST['paymentMethodID']) && isset($_POST['payBalanceAmount'])) {
      $newBalance = $_SESSION['balance'] + $_POST['payBalanceAmount'];
      if ($this->user->updateBalance($_SESSION['username'], $newBalance)) {
        $_SESSION['balance'] = $newBalance;
        $this->payment->createPayment($_POST['paymentMethodID'], $_POST['payBalanceAmount']);
      } else {
        $error = "Could not update balance.";
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
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_POST['updateEmail'])) {
      $email = filter_var(trim(strtolower($_POST["updateEmail"])), FILTER_SANITIZE_EMAIL);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email address is not valid.";
      }

      if (!$this->user->updateEmail($_SESSION['username'], $email)) {
        $error = "An error occurred while updating the email address.";
      }

      $_SESSION['email'] = $email;
      $message = "Email changed successfully.";
    }

    if (isset($_GET["switchWithdrawal"])) {
      if ($this->user->updateWithdrawal($_SESSION['username'])) {
        $_SESSION["isAutomatic"] = !$_SESSION["isAutomatic"];
      } else {
        $error = "An error as occurred.";
      }
    }

    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phoneNumber']) && isset($_POST['companyName'])) {
      if (!$this->profile->updateProfile(
        $_SESSION['username'],
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['phoneNumber'],
        $_POST['companyName'],
        $_POST['categoryName']
      )) {
        $error = "An error occurred while updating.";
      }
    }

    if (isset($_SESSION["loggedIn"])) {
      $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);
    }

    if ($_SESSION['isEmployer']) {
      $profileInfo = $this->profile->getProfile($_SESSION['username']);
    }

    include 'view/profile.php';
  }
}
