<?php
require "templates/head.html";
if (!isset($_SESSION)) {
  session_start();
}
?>

<head>
  <title>Reports</title>
</head>

<body>
  <?php
  $heroTitle = "Reports";
  require "templates/hero.php";
  ?>
  <?php if (isset($error) || isset($message)) : ?>
    <section class="section">
      <div class="container">
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
      </div>
    </section>
  <?php endif; ?>
  <div class="columns">
    <div class="column">
      <section class="section">
        <div class="container">
          <h1 class="title">Stats</h1>
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <tbody>
              <tr>
                <td>Emails Sent to You</td>
                <?php
                echo "<td>$emailCount->count</td>";
                ?>
              </tr>
              <tr>
                <td>Jobs You Applied to</td>
                <?php
                echo "<td>$applicationCount->count</td>";
                ?>
              </tr>
              <tr>
                <td>Jobs You Posted</td>
                <?php
                echo "<td>$jobsCount->count</td>";
                ?>
              </tr>
              <tr>
                <td>Jobs Offers Accepted</td>
                <?php
                echo "<td>$jobAcceptedCount->count</td>";
                ?>
              </tr>
              <tr>
                <td>Jobs Offers Sent</td>
                <?php
                echo "<td>$jobOfferedCount->count</td>";
                ?>
              </tr>
              <tr>
                <td>Payments Made</td>
                <?php
                echo "<td>$paymentCount->count</td>";
                ?>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
    <div class="column">
      <section class="section">
        <div class="container">
          <h1 class="title">Emails</h1>
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
              <tr>
                <th>Subject</th>
                <th>Content</th>
                <th>Date Sent</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($emails)) {
                foreach ($emails as $index => $email) {
                  echo '<tr>';
                  echo "<td>$email->title</td>";
                  echo "<td>$email->content</td>";
                  echo "<td>$email->dateSent</td>";
                  echo '</tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
    <div class="column">
      <section class="section">
        <div class="container">
          <h1 class="title">Payments</h1>
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
              <tr>
                <th>Payment Date</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($payments)) {
                foreach ($payments as $index => $payment) {
                  echo '<tr>';
                  echo "<td>$payment->paymentDate</td>";
                  echo "<td>$payment->amount</td>";
                  echo '</tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>
