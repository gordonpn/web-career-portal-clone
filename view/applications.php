<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Applications</title>
</head>

<body>
  <?php
  $heroTitle = "Applications";
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
            <th>Job Title</th>
            <th>Description</th>
            <th>Applicant</th>
            <th>Date Applied</th>
            <th>Job Offer Sent</th>
            <th>Employee Accepted Job Offer</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($applications as $index => $obj) {
            echo '<tr>';
            echo "<td>$obj->title</td>";
            echo "<td>$obj->description</td>";
            echo "<td>$obj->userID</td>";
            echo "<td>$obj->dateApplied</td>";
            if ($obj->isAcceptedByEmployer) {
              echo "<td>Yes</td>";
            } else {
              echo "<td>No</td>";
            }
            if ($obj->isAcceptedByEmployee) {
              echo "<td>Yes</td>";
            } else {
              echo "<td>No</td>";
            }
            echo '<td>';
            echo "<a class=\"button is-small is-warning\" href=\"applications?toggleAcceptanceEmployer={$obj->jobID}&applicant={$obj->userID}\">";
            if ($obj->isAcceptedByEmployer) {
              echo 'Decline';
            } else {
              echo 'Offer Job';
            }
            echo '</a>';
            echo '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
