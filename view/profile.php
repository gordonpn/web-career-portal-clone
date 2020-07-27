<?php include "templates/head.html"; ?>

<head>
  <title>My Profile</title>
</head>

<body>
  <section class="hero is-info">
    <?php include "templates/navbar.html"; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          My Profile
        </h1>
        <h2 class="subtitle">
          USERNAME
        </h2>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        General Information
      </h1>
      <p>
        Registered email:
      </p>
      <p>
        Your account type:
      </p>
      <p>
        Your current plan:
      </p>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Change Email
      </h1>
      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right" style="max-width:400px;">
          <input class="input" type="email" placeholder="Email" required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Change Email
          </button>
        </p>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Change Employer Information
      </h1>
      <div class="field">
        <label class="label">Employer Contact</label>
        <div class="control has-icons-left has-icons-right" style="max-width:400px;">
          <input class="input" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" placeholder="000-000-0000" required>
          <span class="icon is-small is-left">
            <i class="fas fa-phone"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-link">
            Change Contact Info
          </button>
        </p>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Change Plan
      </h1>
      <div class="field">
        <!-- TODO should show plans according to account type, not all -->
        <label class="label">New Plan</label>
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
            Confirm Change
          </button>
        </p>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Delete Account
      </h1>
      <p>
        This change cannot be undone.
      </p>
      <br>
      <div class="field">
        <p class="control">
          <button class="button is-danger">
            Delete Account
          </button>
        </p>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
