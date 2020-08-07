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
  <div class="columns">
    <div class="column">
      <section class="section">
        <div class="container" style="max-width:40vw">
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
          <h1 class="title">
            General Information
          </h1>
          <?php
          echo "<p>Registered email: {$_SESSION['email']}</p>";
          echo "<p>Account type: {$_SESSION['userType']}</p>";
          echo "<p>Current plan: {$_SESSION['planName']}</p>";
          if (!$_SESSION['isAdmin']) {
            echo "<p>Current withdrawal method: ";
            if ($_SESSION['isAutomatic']) {
              echo 'Automatic';
            } else {
              echo 'Manual';
            }
            echo '<p>Current balance: $' . $_SESSION['balance'] . '</p>';
          }
          ?>
        </div>
      </section>
      <section class="section">
        <div class="container" style="max-width:40vw">
          <h1 class="title">
            Change Email
          </h1>
          <form action="profile" method="POST">
            <div class="field">
              <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right" style="max-width:400px;">
                <input name="updateEmail" class="input" type="email" placeholder="<?php echo "{$_SESSION['email']}"; ?>" required>
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <p class="control">
                <button class="button is-link" type="submit">
                  Change Email
                </button>
              </p>
            </div>
          </form>
        </div>
      </section>
      <section class="section">
        <div class="container" style="max-width:40vw">
          <h1 class="title">
            Change Password
          </h1>
          <div class="field">
            <p class="control">
              <button class="button is-link" id="change-password-btn">
                Change Password
              </button>
            </p>
          </div>
        </div>
        <div class="modal" id="modal-change-password">
          <div class="modal-background"></div>
          <?php require "templates/newPasswordModal.html"; ?>
        </div>
      </section>
      <?php if ($_SESSION["isEmployer"]) : ?>
        <section class="section">
          <div class="container" style="max-width:40vw">
            <h1 class="title">
              Change Employer Information
            </h1>
            <button class="button is-link" id="employer-contact-btn">
              Change Employer Information
            </button>
          </div>
          <div class="modal" id="modal-employer-contact">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">Change Employer Contact Information</p>
                <button class="delete" aria-label="close" id="employer-contact-close-btn"></button>
              </header>
              <?php if (isset($profileInfo)) : ?>
                <section class="modal-card-body">
                  <form action="profile" method="POST">
                    <label class="label">First Name and Last Name</label>
                    <div class="field has-addons">
                      <div class="control">
                        <input class="input" name="firstName" type="text" value="<?php echo "$profileInfo->firstName"; ?>">
                      </div>
                      <div class="control">
                        <input class="input" name="lastName" type="text" value="<?php echo "$profileInfo->lastName"; ?>">
                      </div>
                    </div>
                    <div class="field">
                      <label class="label">Phone Number</label>
                      <div class="control has-icons-left has-icons-right" style="max-width:400px;">
                        <input class="input" type="tel" name="phoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="13" value="<?php echo "$profileInfo->phoneNumber"; ?>">
                        <span class="icon is-small is-left">
                          <i class="fas fa-phone"></i>
                        </span>
                      </div>
                      <p class="help">Format: 000-000-0000</p>
                    </div>
                    <div class="field">
                      <label class="label">Company Name</label>
                      <div class="control">
                        <input class="input" name="companyName" type="text" value="<?php echo "$profileInfo->companyName"; ?>">
                      </div>
                    </div>
                    <div class="field">
                      <label class="label">Category Name</label>
                      <div class="control">
                        <input class="input" name="categoryName" type="text" value="<?php echo "$profileInfo->categoryName"; ?>">
                      </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                  <button class="button is-success" type="submit">Save changes</button>
                </footer>
                </form>
              <?php else : ?>
                <section class="modal-card-body">
                  <p class="has-text-weight-bold has-text-danger">Failed retrieving profile information.</p>
                </section>
              <?php endif; ?>
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
          <a class="button is-danger" id="delete-account-btn">
            Delete Account
          </a>
          <div class="modal" id="modal-delete-account">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head">
                <p class="modal-card-title">Are you sure?</p>
                <a class="delete" aria-label="close" id="delete-account-close-btn"></a>
              </header>
              <section class="modal-card-body">
                <a class="button is-danger" href="dashboard?deleteAccount=true">Yes</a>
                <a class="button" id="delete-account-cancel-btn">Cancel</a>
              </section>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="column">
      <?php if (!$_SESSION['isAdmin'] && !$_SESSION['isAutomatic']) : ?>
        <section class="section">
          <div class="container" style="max-width:40vw">
            <h1 class="title">Pay Balance</h1>
            <a class="button is-link" id="pay-balance-btn">
              <span class="icon">
                <i class="fas fa-dollar-sign"></i>
              </span>
              <span>
                Pay Balance
              </span>
            </a>
            <?php include 'templates/payBalanceModal.php'; ?>
          </div>
        </section>
      <?php endif; ?>
      <?php if (!$_SESSION['isAdmin']) : ?>
        <section class="section">
          <div class="container" style="max-width:40vw">
            <h1 class="title">
              Manage Payment Methods
            </h1>
            <div class="field">
              <p class="control">
                <a class="button is-link" href="managePaymentMethods">
                  Manage Payment Methods
                </a>
              </p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="container" style="max-width:40vw">
            <h1 class="title">
              Change Plan
            </h1>
            <form action="profile" method="POST">
              <div class="field">
                <label class="label">New Plan</label>
                <div class="control">
                  <div class="select">
                    <select name="newPlan">
                      <?php if ($_SESSION["isEmployee"]) {
                        switch ($_SESSION['planName']) {
                          case 'Employee Basic':
                            echo '<option value="Employee Basic">Employee Basic</option>';
                            echo '<option value="Employee Prime">Employee Prime</option>';
                            echo '<option value="Employee Gold">Employee Gold</option>';
                            break;
                          case 'Employee Prime':
                            echo '<option value="Employee Prime">Employee Prime</option>';
                            echo '<option value="Employee Basic">Employee Basic</option>';
                            echo '<option value="Employee Gold">Employee Gold</option>';
                            break;
                          case 'Employee Gold':
                            echo '<option value="Employee Gold">Employee Gold</option>';
                            echo '<option value="Employee Basic">Employee Basic</option>';
                            echo '<option value="Employee Prime">Employee Prime</option>';
                            break;
                        }
                      }
                      if ($_SESSION["isEmployer"]) {
                        if (strcmp($_SESSION['planName'], 'Employer Prime') == 0) {
                          echo '<option value="Employer Prime">Employer Prime</option>';
                          echo '<option value="Employer Gold">Employer Gold</option>';
                        } else {
                          echo '<option value="Employer Gold">Employer Gold</option>';
                          echo '<option value="Employer Prime">Employer Prime</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="field">
                <p class="control">
                  <button type="submit" class="button is-link">
                    Change Plan
                  </button>
                </p>
              </div>
            </form>
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
    </div>
  </div>
  <script type="text/javascript">
    const deleteAccountModal = document.getElementById("modal-delete-account");
    const changePasswordModal = document.getElementById("modal-change-password");
    const payBalanceModal = document.getElementById("modal-pay-balance");
    const payBalanceCloseButton = document.getElementById("pay-balance-close-btn");
    const payBalanceButton = document.getElementById("pay-balance-btn");
    const contactInfoModal = document.getElementById("modal-employer-contact");
    const contactInfoCloseButton = document.getElementById("employer-contact-close-btn");
    const contactInfoButton = document.getElementById("employer-contact-btn");

    function closeModal() {
      if (deleteAccountModal) {
        deleteAccountModal.className = "modal";
      }
      if (changePasswordModal) {
        changePasswordModal.className = "modal";
      }
      if (payBalanceModal) {
        payBalanceModal.className = "modal";
      }
      if (contactInfoModal) {
        contactInfoModal.className = "modal";
      }
    }
    document.getElementById("delete-account-close-btn").addEventListener('click', closeModal);
    document.getElementById("delete-account-cancel-btn").addEventListener('click', closeModal);
    document.getElementById("new-password-close-btn").addEventListener('click', closeModal);
    document.getElementById("new-password-cancel-btn").addEventListener('click', closeModal);
    if (payBalanceCloseButton) {
      payBalanceCloseButton.addEventListener('click', closeModal);
    }
    if (contactInfoCloseButton) {
      contactInfoCloseButton.addEventListener('click', closeModal);
    }

    document.getElementById("delete-account-btn").addEventListener('click', function() {
      deleteAccountModal.className = "modal is-active";
    });
    document.getElementById("change-password-btn").addEventListener('click', function() {
      changePasswordModal.className = "modal is-active";
    });
    if (payBalanceButton) {
      payBalanceButton.addEventListener('click', function() {
        payBalanceModal.className = "modal is-active";
      });
    }
    if (contactInfoButton) {
      contactInfoButton.addEventListener('click', function() {
        contactInfoModal.className = "modal is-active";
      });
    }
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
