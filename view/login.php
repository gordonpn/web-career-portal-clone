<?php
include "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Login</title>
</head>

<body>
  <section class="hero is-info">
    <?php include "templates/navbar.php"; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Login
        </h1>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:30vw">
      <div class="field">
        <label class="label">Username</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Username" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Password" required>
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Login
          </button>
        </p>
      </div>
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
