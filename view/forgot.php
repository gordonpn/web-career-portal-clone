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
            <p class="has-text-weight-bold has-text-danger">
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
      <div class="modal is-active" id="new-password-modal">
        <div class="modal-background"></div>
        <?php include "templates/newPasswordModal.html"; ?>
      </div>
    <?php endif; ?>
    <script type="text/javascript">
      const modal = document.getElementById("new-password-modal");
      const closeButton = document.getElementById("new-password-close-btn");
      const cancelButton = document.getElementById("new-password-cancel-btn");

      function closeModal() {
        modal.className = "modal";
      }

      if (closeButton) {
        closeButton.addEventListener('click', closeModal);
      }
      if (cancelButton) {
        cancelButton.addEventListener('click', closeModal);
      }
    </script>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
