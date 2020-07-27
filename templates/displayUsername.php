<?php
if (isset($_SESSION["loggedIn"])) :
  echo "<h2 class=\"subtitle\">" . $_SESSION["username"] . "</h2> ";
else :
  echo '
  <h2 class="subtitle">
    You are not logged in
  </h2>
  ';
endif;
