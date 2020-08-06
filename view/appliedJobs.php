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
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
