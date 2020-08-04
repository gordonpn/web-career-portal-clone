<?php
if (!isset($_SESSION)) {
  session_start();
}

class BalanceService
{
  public function __construct()
  {
  }

  public function calculateBalanceDifference($currentPlan, $newPlan)
  {
    $plans = array(
      "Employee Basic" => 0,
      "Employee Prime" => 10,
      "Employee Gold" => 20,
      "Employer Prime" => 50,
      "Employer Gold" => 100
    );
    return $plans[$currentPlan] - $plans[$newPlan];
  }
}
