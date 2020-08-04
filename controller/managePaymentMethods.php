<?php
if (!isset($_SESSION)) {
  session_start();
}

require "model/PaymentMethod.php";

class ManagePaymentMethodsController
{
  public $paymentMethod;

  public function __construct()
  {
    $this->paymentMethod = new PaymentMethod();
  }

  public function invoke()
  {
    if (!isset($_SESSION['loggedIn'])) {
      $error = "Please log in first.";
      include 'view/login.php';
      return null;
    }

    if ($_SESSION['isAdmin']) {
      $error = "You must be an employee or employer to access this page.";
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) {
      include 'view/dashboard.php';
      return null;
    }

    if (isset($_POST['updatePreSelected'])) {
      if (!$this->paymentMethod->updatePreSelected($_SESSION['username'], $_POST['updatePreSelected'])) {
        $error = "An error occurred while updating.";
      }
    }

    if (isset($_GET['deletePaymentMethod'])) {
      if (!$this->paymentMethod->deletePaymentMethod($_GET['deletePaymentMethod'])) {
        $error = "An error occurred while deleting.";
      }
    }

    if (isset($_POST['newCardNumber']) && isset($_POST['newPaymentType'])) {
      if (!$this->paymentMethod->createPaymentMethod(
        $_SESSION['username'],
        $_POST['newPaymentType'],
        $_POST['newCardNumber'],
        false
      )) {
        $error = "An error occurred while creating a new payment method.";
      }
    }

    $paymentMethods = $this->paymentMethod->getPaymentMethodsOf($_SESSION['username']);

    include 'view/managePaymentMethods.php';
  }
}
