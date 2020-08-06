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
  </section>
  <?php if (isset($categoryJobs)) : ?>
    <div class="modal is-active" id="categories-modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Jobs</p>
          <a class="delete" aria-label="close" id="categories-modal-close-btn"></a>
        </header>
        <section class="modal-card-body">
          <div>
            <ul>
              <?php
              foreach ($categoryJobs as $index => $obj) {
                echo "<li>$obj->title</li>";
              }
              ?>
            </ul>
          </div>
        </section>
      </div>
    </div>
  <?php endif; ?>
  <script>
    const categoriesModal = document.getElementById("categories-modal");
    const categoriesModalCloseBtn = document.getElementById("categories-modal-close-btn");

    function closeModal() {
      categoriesModal.className = "modal";
    }

    if (categoriesModalCloseBtn) {
      categoriesModalCloseBtn.addEventListener('click', closeModal);
    }
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
