<?php
include "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Jobs</title>
</head>

<body>
  <section class="hero is-info">
    <?php include "templates/navbar.php"; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Jobs
        </h1>
        <?php include "templates/displayUsername.php"; ?>
      </div>
    </div>
    <?php include "templates/dashboardNav.php"; ?>
  </section>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Search for a job
      </h1>
      <div class="field has-addons">
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Position, company, ...">
          <span class="icon is-small is-left">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>
        </div>
        <div class="control">
          <a class="button is-link">
            Search
          </a>
        </div>
      </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
