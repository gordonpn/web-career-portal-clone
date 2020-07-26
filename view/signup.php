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
                <a class="button is-info is-inverted" href="dashboard">
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
    <div class="container" style="width:50vw">
      <div class="field">
        <div class="control has-icons-left has-icons-right">
          <input class="input is-success" type="text" placeholder="Username">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Password">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <div class="control">
          <div class="select">
            <select>
              <option>Select Plan</option>
              <option>Basic</option>
              <option>Prime</option>
              <option>Gold</option>
            </select>
          </div>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-success">
            Sign Up
          </button>
        </p>
      </div>
      <p>Already have an account?</p>
      <div class="field">
        <p class="control">
          <a class="button is-info" href="login">
            Login
          </a>
        </p>
      </div>
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
                  <p>
                    <strong>Basic</strong>
                    <br>
                    <strong>Free</strong>
                    <br>
                    You can only view jobs and cannot apply.
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
                  <p>
                    <strong>Prime</strong>
                    <br>
                    <strong>$10/month</strong>
                    <br>
                    You can view jobs and apply up to 5 jobs.
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
                  <p>
                    <strong>Gold</strong>
                    <br>
                    <strong>$20/month</strong>
                    <br>
                    You can view jobs and apply to as many as you want.
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
