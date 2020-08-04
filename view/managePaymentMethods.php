<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Manage Payment Methods</title>
</head>

<body>
  <?php
  $heroTitle = "Manage Payment Methods";
  require "templates/hero.php";
  ?>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
