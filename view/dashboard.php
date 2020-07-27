<?php include "templates/head.html"; ?>

<head>
  <title>Dashboard</title>
</head>

<body>
<!-- TODO do no display login and signup buttons if the user is logged in -->
  <section class="hero is-info">
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
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Dashboard
        </h1>
        <h2 class="subtitle">
        </h2>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
