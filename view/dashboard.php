<?php
include "templates/head.html";
session_start();

function logout()
{
  session_unset();

  session_destroy();
}

if (isset($_GET["logout"])) {
  logOut();
}
?>

<head>
  <title>Dashboard</title>
</head>

<body>
  <!-- TODO do no display login and signup buttons if the user is logged in -->
  <section class="hero is-info">
    <?php include "templates/navbar.php"; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Dashboard
        </h1>
        <?php include "templates/displayUsername.php"; ?>
      </div>
    </div>
    <?php include "templates/dashboardNav.php"; ?>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
