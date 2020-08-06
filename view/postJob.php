<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Post New Job</title>
</head>

<body>
  <?php
  $heroTitle = "Post New Job";
  require "templates/hero.php";
  ?>
  <section class="section">
    <div class="container" style="max-width:60vw">
      <?php if (isset($error)) : ?>
        <p class="has-text-weight-bold has-text-danger">
          <?php echo $error; ?>
        </p>
      <?php endif; ?>
      <?php if (isset($message)) : ?>
        <p class="has-text-weight-bold has-text-info">
          <?php echo $message; ?>
        </p>
      <?php endif; ?>
      <form action="postJob" method="POST">
        <label class="label">Title and Job Category</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <input class="input" name="title" type="text" placeholder="Title" required>
          </div>
          <div class="control is-expanded">
            <input class="input" name="jobCategory" type="text" placeholder="Job Category" required>
          </div>
        </div>
        <label class="label">Salary and Positions Available</label>
        <div class="field has-addons">
          <p class="control">
            <input name="salary" class="input" type="number" min="0" placeholder="Salary" required>
          </p>
          <p class="control">
            <input name="positionsAvailable" class="input" type="number" min="1" placeholder="Positions Available" required>
          </p>
        </div>
        <div class="field">
          <label class="label">Description</label>
          <div class="control">
            <textarea name="description" class="textarea" placeholder="Description" required></textarea>
          </div>
        </div>
        <label class="label">Location</label>
        <div class="field has-addons">
          <div class="control">
            <input class="input" name="address" type="text" placeholder="Address">
          </div>
          <div class="control">
            <input class="input" name="city" type="text" placeholder="City" required>
          </div>
          <div class="control">
            <input class="input" name="postalCode" type="text" placeholder="Postal Code">
          </div>
          <div class="control">
            <input class="input" name="province" type="text" placeholder="Province">
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-link" type="submit">
              Post New Job
            </button>
          </p>
        </div>
      </form>
    </div>
  </section>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
