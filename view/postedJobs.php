<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Posted Jobs</title>
</head>

<body>
  <?php
  $heroTitle = "Posted Jobs";
  require "templates/hero.php";
  ?>
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
            <th>Title</th>
            <th>Location</th>
            <th>Salary</th>
            <th>Description</th>
            <th>Positions Available</th>
            <th>Date Posted</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($postedJobs)) {
            foreach ($postedJobs as $index => $obj) {
              echo '<tr>';
              echo "<td>$obj->title</td>";
              echo "<td>$obj->city</td>";
              echo "<td>$obj->salary</td>";
              echo "<td>$obj->description</td>";
              echo "<td>$obj->positionsAvailable</td>";
              echo "<td>$obj->datePosted</td>";
              echo "<td>$obj->status</td>";
              echo '<td>';
              echo "<a class=\"button is-small is-warning is-light\" href=\"postedJobs?toggleStatus=$obj->jobID\">";
              echo 'Toggle Status';
              echo '</a>';
              echo '</td>';
              echo '<td>';
              echo "<a class=\"button is-small is-danger is-light\" href=\"postedJobs?deleteJob=$obj->jobID\">";
              echo 'Delete';
              echo '</a>';
              echo '</td>';
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
