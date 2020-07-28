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
  <?php
  $heroTitle = "Jobs";
  include "templates/hero.php";
  ?>
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
