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
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
