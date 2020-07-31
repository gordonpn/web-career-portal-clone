<?php
require "templates/head.html";
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
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <?php
      if (isset($error)) {
        echo "<p class=\"has-text-danger\">$error</p>";
      }
      ?>
      <h1 class="title">
        General Information
      </h1>
      <?php
      echo "<p>Registered email: {$_SESSION['email']}</p>";
      echo "<p>Account type: {$_SESSION['userType']}</p>";
      echo "<p>Current plan: {$_SESSION['planName']}</p>";
      echo "<p>Current withdrawal method: ";
      if ($_SESSION['isAutomatic']) {
        echo 'Automatic';
      } else {
        echo 'Manual';
      }
      echo '<p>Current balance: $' . $_SESSION['balance'] . '</p>';
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
          <div class="control">
            <a class="button is-link" href="profile?switchWithdrawal=true">
              <?php
              if ($_SESSION["isAutomatic"]) {
                echo 'Switch to Manual';
              } else {
                echo 'Switch to Automatic';
              }
              ?>
            </a>
          </div>
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
      <a class="button is-danger" id="delete-btn">
        Delete Account
      </a>
      <div class="modal" id="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Are you sure?</p>
            <a class="delete" aria-label="close" id="close-btn"></a>
          </header>
          <section class="modal-card-body">
            <a class="button is-danger" href="dashboard?deleteAccount=true">Yes</a>
            <a class="button" id="cancel-btn">Cancel</a>
          </section>
        </div>
      </div>
      <script>
        const modal = document.getElementById("modal");

        function closeModal() {
          modal.className = "modal";
        }
        document.getElementById("close-btn").addEventListener('click', closeModal);
        document.getElementById("cancel-btn").addEventListener('click', closeModal);
        document.getElementById("delete-btn").addEventListener('click', function() {
          modal.className = "modal is-active";
        });
      </script>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
