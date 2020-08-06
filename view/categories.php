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
      <div class="columns">
        <div class="column">
          <table class="table is-bordered is-striped is-narrow is-hoverable">
            <thead>
              <tr>
                <th>Category</th>
                <th>Jobs Available</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($categories)) {
                foreach ($categories as $index => $obj) {
                  echo '<tr>';
                  echo '<td>';
                  echo "<a class=\"is-info\" href=\"categories?showCategoryJobs=$obj->jobCategoriesID\">";
                  echo "$obj->categoryName";
                  echo '</a>';
                  echo "<td>$obj->numPostings</td>";
                  echo '</tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="column">
          <?php
          if (isset($jobs)) {
            $fromPage = "categories";
            include 'templates/jobsTable.php';
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js">
  </script>
</body>
