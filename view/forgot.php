<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Forgot Password</title>
</head>

<body>
  <?php
  $heroTitle = "Forgot My Password";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:30vw">
      <form action="forgot" method="POST">
        <div class="field">
          <?php if (isset($error)) : ?>
            <p class="has-text-danger">
              <?php echo $error; ?>
            </p>
          <?php endif; ?>
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" name="email" type="email" placeholder="Email" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button type="submit" class="button is-link">
              Forgot My Password
            </button>
          </p>
        </div>
      </form>
    </div>
    <?php if (isset($showModalPassword) && $showModalPassword) : ?>
      <div class="modal is-active" id="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Type a new password</p>
            <a class="delete" aria-label="close" id="close-btn"></a>
          </header>
          <section class="modal-card-body">
            <form action="forgot" method="POST" onsubmit="return validatePassword();">
              <div class="field">
                <label class="label">New Password</label>
                <p class="control has-icons-left">
                  <input name="password" class="input" type="password" placeholder="Password" required id="new-password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <label class="label">Confirm New Password</label>
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Password" required id="confirm-password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
                <p style="visibility: hidden" class="has-text-danger" id="error-text">Passwords entered do not match</p>
              </div>
              <button class="button is-outlined is-link" id="confirm-btn" type="submit">Confirm change</button>
              <a class="button is-outlined" id="cancel-btn">Cancel</a>
            </form>
          </section>
        </div>
      </div>
    <?php endif; ?>
    <script type="text/javascript">
      const modal = document.getElementById("modal");
      const errorText = document.getElementById("error-text");
      const newPassword = document.getElementById("new-password");
      const confirmPassword = document.getElementById("confirm-password");
      const closeButton = document.getElementById("close-btn");
      const cancelButton = document.getElementById("cancel-btn");

      function closeModal() {
        modal.className = "modal";
      }
      if (closeButton) {
        closeButton.addEventListener('click', closeModal);
      }
      if (cancelButton) {
        cancelButton.addEventListener('click', closeModal);
      }

      function validatePassword() {
        if (newPassword.value != confirmPassword.value) {
          errorText.style.visibility = "visible";
          return false;
        } else {
          errorText.style.visibility = "hidden";
          return true;
        }
      };
    </script>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
