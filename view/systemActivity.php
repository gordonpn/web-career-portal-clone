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
          ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>
