<?php
if (!isset($_SESSION["loggedIn"])) {
  return null;
}
?>
<div class="hero-foot">
  <nav class="tabs is-boxed">
    <div class="container">
      <ul>
        <?php
        if ($_SESSION["balance"] < 0) {
          return null;
        }

        if ($_SESSION["balance"] < 0) {
          return null;
        }

        if ($_SESSION["isEmployee"]) {
          if (strcasecmp($heroTitle, 'jobs') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a href="jobs">Jobs</a></li>';

          if (strcasecmp($heroTitle, 'job categories') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a href="categories">Job Categories</a></li>';

          if (strcasecmp($heroTitle, 'applied jobs') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a>Applied Jobs</a></li>';
        }

        if ($_SESSION["isEmployer"]) {
          if (strcasecmp($heroTitle, 'posted jobs') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a>Posted Jobs</a></li>';

          if (strcasecmp($heroTitle, 'applications') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a>Applications</a></li>';
        }

        if ($_SESSION["isAdmin"]) {
          if (strcasecmp($heroTitle, 'users') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a>Users</a></li>';

          if (strcasecmp($heroTitle, 'system activity') == 0) {
            echo '<li class="is-active">';
          } else {
            echo '<li>';
          }
          echo '<a>System Activity</a></li>';
        }

        if (strcasecmp($heroTitle, 'my profile') == 0) {
          echo '<li class="is-active">';
        } else {
          echo '<li>';
        }
        echo '<a href="profile">My Profile</a></li>';
        ?>
      </ul>
    </div>
  </nav>
</div>
