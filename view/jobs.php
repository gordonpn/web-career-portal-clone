<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Jobs</title>
</head>

<body>
  <?php
  $heroTitle = "Jobs";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:40vw">
      <h1 class="title">
        Search for a job
      </h1>
      <form action="jobs" method="GET">
        <div class="field has-addons">
          <div class="control has-icons-left has-icons-right">
            <input name="searchKeyword" class="input" type="text" placeholder="Job title, company, ...">
            <span class="icon is-small is-left">
              <i class="fa fa-search" aria-hidden="true"></i>
            </span>
          </div>
          <div class="control">
            <button class="button is-link" type="submit">
              Search
            </button>
          </div>
        </div>
      </form>
  </section>
  <section class="section">
    <div class="container">
      <?php if (isset($error)) : ?>
        <p class="has-text-weight-bold has-text-danger">
          <?php echo $error; ?>
        </p>
      <?php endif; ?>
      <?php
      $fromPage = "jobs";
      require 'templates/jobsTable.php';
      ?>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
