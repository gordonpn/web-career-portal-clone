<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Dashboard</title>
</head>

<body>
  <?php
  $heroTitle = "Dashboard";
  require "templates/hero.php";
  ?>
  <?php if (isset($error) || isset($message)) : ?>
    <section class="section">
      <div class="container">
        <?php if (isset($error)) : ?>
          <p class="has-text-weight-bold has-text-danger">
            <?php echo $error; ?>
          </p>
        <?php endif; ?>
        <?php if (isset($message)) : ?>
          <p class="has-text-weight-bold has-text-info">
            <?php echo $message; ?>
          </p>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
  <?php if (isset($_SESSION["loggedIn"]) && $_SESSION["balance"] < 0) : ?>
    <section class="hero is-danger">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Your account is frozen.
          </h1>
          <?php echo "<h2 class=\"subtitle\">Your current balance is {$_SESSION['balance']}$</h2>"; ?>
          <a class="button is-danger is-inverted" id="pay-balance-btn">
            <span class="icon">
              <i class="fas fa-dollar-sign"></i>
            </span>
            <span>
              Pay your Balance
            </span>
          </a>
          <?php include 'templates/payBalanceModal.php'; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <script type="text/javascript">
    const payBalanceModal = document.getElementById("modal-pay-balance");
    const payBalanceCloseButton = document.getElementById("pay-balance-close-btn");
    const payBalanceButton = document.getElementById("pay-balance-btn");

    function closeModal() {
      payBalanceModal.className = "modal";
    }
    if (payBalanceCloseButton) {
      payBalanceCloseButton.addEventListener('click', closeModal);
    }
    if (payBalanceButton) {
      payBalanceButton.addEventListener('click', function() {
        payBalanceModal.className = "modal is-active";
      });
    }
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
