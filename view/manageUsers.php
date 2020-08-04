<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Manage Users</title>
</head>

<body>
  <?php
  $heroTitle = "Manage Users";
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
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Date Created</th>
            <th>Active</th>
            <th>Start Suffering Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($users as $index => $obj) {
            echo '<tr>';
            foreach ($obj as $propName => $propValue) {
              if (strcasecmp($propName, 'isActive') == 0) {
                if ($propValue) {
                  echo '<th>True</th>';
                } else {
                  echo '<th>False</th>';
                }
                continue;
              }
              echo "<td>$propValue</td>";
            }
            echo '<td>';
            echo "<a class=\"button is-small is-danger is-light\" href=\"manageUsers?toggleActive=$obj->userID\">";
            echo 'Toggle Active Status';
            echo '</a>';
            echo '</td>';
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
