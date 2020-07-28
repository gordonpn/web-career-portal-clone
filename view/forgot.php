<?php
include "templates/head.html";
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
  include "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:30vw">
      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Email" required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Forgot My Password
          </button>
        </p>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
