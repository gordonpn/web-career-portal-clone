<?php
include "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>My Profile</title>
</head>

<body>
  <?php
  $heroTitle = "My Profile";
  include "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        General Information
      </h1>
      <?php
      echo '<p>Registered email: ' . $_SESSION['email'] . '</p>';
      echo '<p>Your account type: ' . $_SESSION['userType'] . '</p>';
      echo '<p>Your current plan: ' . $_SESSION['planName'] . '</p>';
      echo '<p>Your current withdrawal method: ';
        if ($_SESSION['isAutomatic']) {
          echo 'Automatic';
        } else {
          echo 'Manual';
        }
      echo '<p>Your current balance: $' . $_SESSION['balance'] . '</p>';
      ?>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Change Email
      </h1>
      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right" style="max-width:400px;">
          <input class="input" type="email" placeholder="Email" required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Change Email
          </button>
        </p>
      </div>
    </div>
  </section>
  <?php if ($_SESSION["isEmployer"]) : ?>
    <section class="section">
      <div class="container" style="max-width:40vw">
        <h1 class="title">
          Change Employer Information
        </h1>
        <div class="field">
          <label class="label">Employer Contact</label>
          <div class="control has-icons-left has-icons-right" style="max-width:400px;">
            <input class="input" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" placeholder="000-000-0000" required>
            <span class="icon is-small is-left">
              <i class="fas fa-phone"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-link">
              Change Contact Info
            </button>
          </p>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php if ($_SESSION["isEmployer"] || $_SESSION["isEmployee"]) : ?>
    <section class="section">
      <div class="container" style="max-width:40vw">
        <h1 class="title">
          Change Plan
        </h1>
        <div class="field">
          <!-- TODO should show plans according to account type, not all -->
          <label class="label">New Plan</label>
          <div class="control">
            <div class="select">
              <select>
                <?php if ($_SESSION["isEmployee"]) : ?>
                  <option>Employee Basic</option>
                  <option>Employee Prime</option>
                  <option>Employee Gold</option>
                <?php endif; ?>
                <?php if ($_SESSION["isEmployer"]) : ?>
                  <option>Employer Prime</option>
                  <option>Employer Gold</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-link">
              Confirm Change
            </button>
          </p>
        </div>
      </div>
    </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Change Withdrawal Method
      </h1>
      <div class="field">
        <label class="label">New Withdrawal Method</label>
        <div class="control">
          <div class="select">
            <select>
              <?php if ($_SESSION["isAutomatic"]) : ?>
              <option> Manual </option>
              <?php else : ?>
              <option> Automatic </option>
              <?php endif ?>
            </select>
          </div>
        </div>
      </div>
      <div class="field">
          <p class="control">
            <button class="button is-link">
              Confirm Change
            </button>
          </p>
        </div>
  </section>
  <?php endif; ?>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Delete Account
      </h1>
      <p>
        This change cannot be undone.
      </p>
      <br>
      <div class="field">
        <p class="control">
          <button class="button is-danger">
            Delete Account
          </button>
        </p>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
