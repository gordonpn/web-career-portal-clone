<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Reports</title>
</head>

<body>
  <?php
  $heroTitle = "Reports";
  require "templates/hero.php";
  ?>
  <?php if (isset($error) || isset($message)) : ?>
    <section class="section">
      <div class="container">
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
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
          <tbody>
            <?php
            ?>
          </tbody>
        </table>
      </div>
    </section>
  <?php endif; ?>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
