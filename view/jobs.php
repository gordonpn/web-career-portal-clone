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
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Job Title</th>
            <th>Date Posted</th>
            <th>Description</th>
            <th>Company Name</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Positions Available</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($jobs as $index => $obj) {
            echo '<tr>';
            echo "<td>$obj->title</td>";
            echo "<td>$obj->datePosted</td>";
            echo "<td>$obj->description</td>";
            echo "<td>$obj->companyName</td>";
            echo "<td>$obj->city</td>";
            echo "<td>$obj->salary</td>";
            echo "<td>$obj->positionsAvailable</td>";
            echo "<td>$obj->status</td>";
            echo '<td>';
            include "templates/contactModal.php";
            echo '</td>';
            echo '<td>';
            echo "<a class=\"button is-small is-success\">";
            echo 'Apply';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <script defer src=" https://use.fontawesome.com/releases/v5.3.1/js/all.js"> </script>
</body>
