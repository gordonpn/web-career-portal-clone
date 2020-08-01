<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>404</title>
</head>

<body>
  <section class="hero is-info is-fullheight-with-navbar">
    <?php require "templates/navbar.php"; ?>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          404 Not Found
        </h1>
        <h2 class="subtitle">
          What you are looking for is not here.
        </h2>
      </div>
    </div>
  </section>

  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
