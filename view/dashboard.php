<?php
include "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Dashboard</title>
</head>

<body>
  <!-- TODO do no display login and signup buttons if the user is logged in -->
  <?php
  $heroTitle = "Dashboard";
  include "templates/hero.php";
  ?>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
