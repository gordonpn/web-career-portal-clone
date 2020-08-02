<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Sign Up</title>
</head>

<body>
  <?php
  $heroTitle = "Sign Up";
  require "templates/hero.php";
  ?>
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
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Email" required>
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
        <label class="label">Select payment method type </label>
        <div class="control">
          <div class="select">
            <select>
              <option> Credit </option>
              <option> Debit </option>
            </select>
          </div>
        </div>
      </div>
      <!-- TODO alternatively use https://github.com/nosir/cleave.js -->
      <div class="field">
        <label class="label"> Card Number:</label>
        <p class="control has-icons-left">
          <input class="input" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
          <span class="icon is-small is-left">
            <i class="far fa-credit-card"></i>
          </span>
        </p>
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
      <p>
        <a href="forgot">
          Forgot your password?
        </a>
      </p>
    </div>
  </section>
  <section class="section">
    <div class="container is-fluid">
      <h1 class="title is-1 has-text-centered">
        Plans
      </h1>
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p class="title is-2">Basic</p>
                  <p class="subtitle is-4">User</p>
                  <p>
                    <strong>Free</strong>
                    <br>
                    User can only view jobs and cannot apply.
                    <br>
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
                  <p class="title is-2">Prime</p>
                  <p class="subtitle is-4">User</p>
                  <p>
                    <strong>$10/month</strong>
                    <br>
                    User can view jobs and apply up to 5 jobs.
                    <br>
                  </p>
                  <p class="subtitle is-4">Employer</p>
                  <p>
                    <strong>$50/month</strong>
                    <br>
                    Employer can post up to five jobs.
                    <br>
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
                  <p class="title is-2">Gold</p>
                  <p class="subtitle is-4">User</p>
                  <p>
                    <strong>$20/month</strong>
                    <br>
                    User can view jobs and apply to as many as you want.
                    <br>
                  </p>
                  <p class="subtitle is-4">Employer</p>
                  <p>
                    <strong>$100/month</strong>
                    <br>
                    Employer can post as many jobs as they want.
                    <br>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
