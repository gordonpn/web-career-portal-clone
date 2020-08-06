<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Applied Jobs</title>
</head>

<body>
  <?php
  $heroTitle = "Applied Jobs";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:60vw">
      <?php if (isset($error)) : ?>
        <p class="has-text-weight-bold has-text-danger">
          <?php echo $error; ?>
        </p>
      <?php endif; ?>
      <?php if (isset($message)) : ?>
        <p class="has-text-weight-bold has-text-info">
          <?php echo $message; ?>
        </p>
      <?php endif; ?>
    </div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>Job Title</th>
          <th>Description</th>
          <th>Status</th>
          <th>Date Applied</th>
          <th>Job Offered</th>
          <th>Offer Accepted</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($jobs as $index => $obj) {
          echo '<tr>';
          echo "<td>$obj->title</td>";
          echo "<td>$obj->description</td>";
          echo "<td>$obj->status</td>";
          echo "<td>$obj->dateApplied</td>";
          if ($obj->isAcceptedByEmployer) {
            echo '<td>Yes</td>';
          } else {
            echo '<td>No</td>';
          }
          if ($obj->isAcceptedByEmployee) {
            echo '<td>Yes</td>';
          } else {
            echo '<td>No</td>';
          }
          if (strcasecmp($obj->status, 'active') == 0) {
            echo '<td>';
            echo "<a class=\"button is-small is-warning\" href=\"appliedJobs?jobWithdraw=$obj->jobID\">";
            echo 'Withdraw';
            echo '</a>';
            echo '</td>';
          } else {
            echo '<td>';
            echo '</td>';
          }
          if ($obj->isAcceptedByEmployee) {
            echo '<td>';
            echo "<a class=\"button is-small is-danger\" href=\"appliedJobs?acceptJobOffer=$obj->jobID\">";
            echo 'Cancel Job Offer';
            echo '</a>';
            echo '</td>';
          } elseif ($obj->isAcceptedByEmployer) {
            echo '<td>';
            echo "<a class=\"button is-small is-success\" href=\"appliedJobs?acceptJobOffer=$obj->jobID\">";
            echo 'Accept Job Offer';
            echo '</a>';
            echo '</td>';
          } else {
            echo '<td>';
            echo '</td>';
          }
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
