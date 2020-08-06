<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Login</title>
</head>

<body>
  <?php
  $heroTitle = "Login";
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
      <form action="dashboard" method="POST">
        <div class="field">
          <label class="label">Username</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" name="username" type="text" placeholder="Username" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <p class="control has-icons-left">
            <input class="input" name="password" type="password" placeholder="Password" required>
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-link" type="submit">
              Login
            </button>
          </p>
        </div>
      </form>
      <br>
      <p>
        <a href="signup">
          Don't have an account yet?
        </a>
      </p>
      <p>
        <a href="forgot">
          Forgot your password?
        </a>
      </p>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
