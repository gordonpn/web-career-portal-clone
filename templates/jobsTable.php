<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Job Title</th>
      <th>Date Posted</th>
      <th>Description</th>
      <th>Company Name</th>
      <th>Location</th>
      <th>Salary</th>
      <th>Positions Available</th>
      <th>Status</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($jobs as $index => $obj) {
      echo '<tr>';
      echo "<td>$obj->title</td>";
      echo "<td>$obj->datePosted</td>";
      echo "<td>$obj->description</td>";
      echo "<td>$obj->companyName</td>";
      echo "<td>$obj->city</td>";
      echo "<td>$obj->salary</td>";
      echo "<td>$obj->positionsAvailable</td>";
      echo "<td>$obj->status</td>";
      echo '<td>';
      include "templates/contactModal.php";
      echo '</td>';
      if (strcasecmp($obj->status, 'active') == 0) {
        echo '<td>';
        if ($obj->applied) {
          if (strcasecmp($fromPage, "categories") == 0) {
            echo "<a class=\"button is-small is-warning\" href=\"categories?jobWithdraw={$obj->jobID}&showCategoryJobs=$previousCategory\">";
          } else {
            if (isset($previousSearch)) {
              echo "<a class=\"button is-small is-warning\" href=\"jobs?jobWithdraw={$obj->jobID}&searchKeyword=$previousSearch\">";
            } else {
              echo "<a class=\"button is-small is-warning\" href=\"jobs?jobWithdraw=$obj->jobID\">";
            }
          }
          echo 'Withdraw';
        } else {
          if (strcasecmp($fromPage, "categories") == 0) {
            echo "<a class=\"button is-small is-success\" href=\"categories?jobApply={$obj->jobID}&showCategoryJobs=$previousCategory\">";
          } else {
            if (isset($previousSearch)) {
              echo "<a class=\"button is-small is-success\" href=\"jobs?jobApply={$obj->jobID}&searchKeyword=$previousSearch\">";
            } else {
              echo "<a class=\"button is-small is-success\" href=\"jobs?jobApply=$obj->jobID\">";
            }
          }
          echo 'Apply';
        }
        echo '</a>';
        echo '</td>';
      } else {
        echo '<td>';
        echo '</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
