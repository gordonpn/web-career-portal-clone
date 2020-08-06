<div class="hero-head">
  <nav class="navbar">
    <div class="container">
      <div id="navbarMenuHeroA" class="navbar-menu">
        <div class="navbar-end">
          <?php if (isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"]) : ?>
            <span class="navbar-item">
              <a class="button is-inverted" href="postJob">
                <span class="icon">
                  <i class="fas fa-plus"></i>
                </span>
                <span>Post New Job</span>
              </a>
            </span>
          <?php endif; ?>
          <span class="navbar-item">
            <a class="button is-inverted" href="dashboard">
              <span class="icon">
                <i class="fas fa-home"></i>
              </span>
              <span>Dashboard</span>
            </a>
          </span>
          <?php if (isset($_SESSION["loggedIn"])) : ?>
            <span class="navbar-item">
              <a class="button is-inverted" href="dashboard?logout=true">
                <span class="icon">
                  <i class="fas fa-sign-out-alt"></i>
                </span>
                <span>Logout</span>
              </a>
            </span>
          <?php else : ?>
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
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</div>
