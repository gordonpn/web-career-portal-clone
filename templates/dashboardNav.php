<?php if (isset($_SESSION["loggedIn"])) : ?>
  <div class="hero-foot">
    <nav class="tabs is-boxed">
      <div class="container">
        <ul>
          <?php if (strcasecmp($heroTitle, 'jobs') == 0) : ?>
            <li class="is-active">
            <?php else : ?>
            <li>
            <?php endif; ?>
            <a href="jobs">Jobs</a>
            </li>
            <?php if (strcasecmp($heroTitle, 'job categories') == 0) : ?>
              <li class="is-active">
              <?php else : ?>
              <li>
              <?php endif; ?>
              <a href="categories">Job Categories</a>
              </li>
              <li><a>Applied Jobs</a></li>
              <?php if ($_SESSION["isEmployer"]) : ?>
                <li><a>Posted Jobs</a></li>
              <?php endif; ?>
              <?php if ($_SESSION["isAdmin"]) : ?>
                <li><a>Users</a></li>
                <li><a>System Activity</a></li>
              <?php endif; ?>
              <?php if (strcasecmp($heroTitle, 'my profile') == 0) : ?>
                <li class="is-active">
                <?php else : ?>
                <li>
                <?php endif; ?>
                <a href="profile">My Profile</a>
                </li>
        </ul>
      </div>
    </nav>
  </div>
<?php endif; ?>
