<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>System Activity</title>
</head>

<body>
  <?php
  $heroTitle = "System Activity";
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
            <th>Activity ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date Recorded</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!isset($activities)) {
            return null;
          }
          foreach ($activities as $index => $obj) {
            echo '<tr>';
            foreach ($obj as $propName => $propValue) {
              echo "<td>$propValue</td>";
            }
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
