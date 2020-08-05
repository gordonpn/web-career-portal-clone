<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Job Categories</title>
</head>

<body>
  <?php
  $heroTitle = "Job Categories";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container">
      <?php if (isset($error)) : ?>
        <p class="has-text-weight-bold has-text-danger">
          <?php echo $error; ?>
        </p>
      <?php endif; ?>
      <table class="table is-bordered is-striped is-narrow is-hoverable">
        <thead>
          <tr>
            <th>Category</th>
            <th>Number of Postings</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($categories as $index => $obj) {
            echo '<tr>';
            echo '<td>';
            echo "<a class=\"is-info\">";
            echo "$obj->categoryName";
            echo '</a>';
            echo "<td>$obj->numPostings</td>";
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
