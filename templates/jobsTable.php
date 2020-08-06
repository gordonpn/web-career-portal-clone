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
      echo '<td>';
      echo "<a class=\"button is-small is-success\">";
      echo 'Apply';
      echo '</a>';
      echo '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
