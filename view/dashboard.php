<?php
include "templates/head.html";
session_start();
?>

<head>
  <title>Dashboard</title>
</head>

<body>
  <!-- TODO do no display login and signup buttons if the user is logged in -->
  <section class="hero is-info">
    <?php if ($_SESSION["loggedIn"]) :
      include "templates/navbar.html";
    else : ?>
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <span class="navbar-item">
                  <a class="button is-inverted" href="login">
                    <span class="icon">
                      <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span>Login</span>
                  </a>
                </span>
                <span class="navbar-item">
                  <a class="button is-inverted" href="signup">
                    <span class="icon">
                      <i class="fas fa-pen"></i>
                    </span>
                    <span>Sign Up</span>
                  </a>
                </span>
              </div>
            </div>
          </div>
        </nav>
      </div>
    <?php endif; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Dashboard
        </h1>
        <?php include "templates/displayUsername.php"; ?>
      </div>
    </div>
    <?php include "templates/dashboardNav.php"; ?>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
