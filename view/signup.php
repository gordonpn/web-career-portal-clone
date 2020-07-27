<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
  <title>Sign Up</title>
</head>

<body>
  <section class="hero is-info">
    <div class="hero-head">
      <nav class="navbar">
        <div class="container">
          <div id="navbarMenuHeroA" class="navbar-menu">
            <div class="navbar-end">
              <span class="navbar-item">
                <a class="button is-inverted" href="dashboard">
                  <span class="icon">
                    <i class="fas fa-home"></i>
                  </span>
                  <span>Home</span>
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
          Sign Up
        </h1>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:30vw">
      <div class="field">
        <label class="label">Username</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Username">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Password">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Email">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Select account type and plan</label>
        <div class="control">
          <div class="select">
            <select>
              <option>User Basic</option>
              <option>User Prime</option>
              <option>User Gold</option>
              <option>Employer Prime</option>
              <option>Employer Gold</option>
            </select>
          </div>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Sign Up
          </button>
        </p>
      </div>
      <p>
        <a href="login">Already have an account?
        </a>
      </p>
    </div>
  </section>
  <section class="section">
    <div class="container is-fluid">

      <h1 class="title has-text-centered">
        Plans
      </h1>
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2>Basic</h2>
                  <h3>User</h3>
                  <p>
                    <br>
                    <strong>Free</strong>
                    <br>
                    User can only view jobs and cannot apply.
                    Not available for Employer account type.
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2>Prime</h2>
                  <h3>User</h3>
                  <p>
                    <br>
                    <strong>$10/month</strong>
                    <br>
                    User can view jobs and apply up to 5 jobs.
                  </p>
                  <h3>Employer</h3>
                  <p>
                    <br>
                    <strong>$50/month</strong>
                    <br>
                    Employer can post up to five jobs.
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2>Gold</h2>
                  <h3>User</h3>
                  <p>
                    <br>
                    <strong>$20/month</strong>
                    <br>
                    User can view jobs and apply to as many as you want.
                  </p>
                  <h3>Employer</h3>
                  <p>
                    <br>
                    <strong>$100/month</strong>
                    <br>
                    Employer can post as many jobs as they want.
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  ?>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
