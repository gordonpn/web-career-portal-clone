<?php if (isset($_SESSION["loggedIn"])) : ?>
  <div class="hero-foot">
    <nav class="tabs">
      <div class="container">
        <ul>
          <li><a href="jobs">Jobs</a></li>
          <li><a href="categories">Job Categories</a></li>
          <li><a>Applied Jobs</a></li>
          <?php if ($_SESSION["isEmployer"]) : ?>
            <li><a>Posted Jobs</a></li>
          <?php endif; ?>
          <?php if ($_SESSION["isAdmin"]) : ?>
            <li><a>Users</a></li>
            <li><a>System Activity</a></li>
          <?php endif; ?>
          <li><a href="profile">Profile</a></li>
        </ul>
      </div>
    </nav>
  </div>
<?php endif; ?>
