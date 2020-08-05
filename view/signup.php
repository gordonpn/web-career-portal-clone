<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Sign Up</title>
</head>

<body>
  <?php
  $heroTitle = "Sign Up";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:30vw">
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
      <form action="signup" method="POST" onsubmit="return validatePassword();">
        <div class="field">
          <label class="label">Username</label>
          <div class="control has-icons-left has-icons-right">
            <input name="username" class="input" type="text" placeholder="Username" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input name="email" class="input" type="email" placeholder="Email" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <p class="control has-icons-left">
            <input name="password" class="input" type="password" placeholder="Password" required id="new-password">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <label class="label">Confirm Password</label>
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="Password" required id="confirm-password">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
          <p style="visibility: hidden" class="has-text-danger" id="error-text">Passwords entered do not match</p>
        </div>
        <div class="field">
          <label class="label">Select account type and plan</label>
          <div class="control">
            <div class="select">
              <select name="plan" required>
                <option value="Employee Basic">Employee Basic</option>
                <option value="Employee Prime">Employee Prime</option>
                <option value="Employee Gold">Employee Gold</option>
                <option value="Employer Prime">Employer Prime</option>
                <option value="Employer Gold">Employer Gold</option>
              </select>
            </div>
          </div>
        </div>
        <label class="label">Payment Information</label>
        <div class="field is-grouped">
          <p class="control has-icons-left">
            <input name="cardNumber" class="input" type="tel" inputmode="numeric" pattern="[0-9]{4,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
            <span class="icon is-small is-left">
              <i class="far fa-credit-card"></i>
            </span>
          </p>
          <div class="control">
            <div class="select">
              <select name="paymentType" required>
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-link" type="submit">
              Sign Up
            </button>
          </p>
        </div>
      </form>
      <br>
      <p>
        <a href="login">Already have an account?
        </a>
      </p>
      <p>
        <a href="forgot">
          Forgot your password?
        </a>
      </p>
    </div>
  </section>
  <?php require 'templates/plans.html' ?>
  <script type="text/javascript" src="templates/validatePassword.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
