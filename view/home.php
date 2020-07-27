<?php
include "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION["loggedIn"] = true;
$_SESSION["username"] = "gordonpn";
$_SESSION["isAdmin"] = true;
$_SESSION["isEmployer"] = true;
?>

<head>
  <title>Home</title>
</head>

<body>
  <section class="hero is-info is-medium">
    <div class="hero-head">
      <nav class="navbar">
        <div class="container">
          <div id="navbarMenuHeroA" class="navbar-menu">
            <div class="navbar-end">
              <a class="navbar-item" href="dashboard">Go To Dashboard</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title">COMP 353 Main Project</h1>
      </div>
    </div>

  </section>
  <footer class="footer">
    <div class="content has-text-centered">
      <p><strong>Authors:</strong></p>
      <p>Arunraj Adlee, 40059206</p>
      <p>Gordon Pham-Nguyen, 40018502</p>
      <p>Leo Jr Silao, 40056822</p>
      <p>Tiffany Zeng, 40063115</p>
    </div>
  </footer>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
